<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $umkmId = Auth::user()->umkm_id ?? 1; // Sesuaikan dengan sistem auth Anda
        
        $query = Product::with(['category', 'umkm'])
                       ->where('umkm_id', $umkmId);

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('barcode', 'like', '%' . $search . '%');
            });
        }

        // Apply category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Apply type filter (assuming type is stored in product_categories table)
        if ($request->filled('type')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('type', $request->type);
            });
        }

        // Apply status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status === 'aktif' ? 1 : 0);
        }

        // Apply sorting
        $sortBy = $request->get('sort_by', 'terbaru');
        if ($sortBy === 'terlama') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(10);
        $categories = ProductCategory::all();

        // Check for low stock items for notification
        $lowStockItems = Product::where('umkm_id', $umkmId)
                               ->where('is_unlimited', 0)
                               ->where('stock', '<=', 5)
                               ->count();

        return view('dashboard.product.katalog.index', compact('products', 'categories', 'lowStockItems'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('dashboard.product.katalog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // Custom validation with Indonesian messages
        $request->validate([
            'type' => 'required|in:barang,jasa',
            'category' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:100',
            'no_barcode' => 'required|string|unique:products,barcode',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:20',
            'stock' => 'nullable|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'type.required' => 'Tipe produk wajib dipilih.',
            'type.in' => 'Tipe produk harus berupa barang atau jasa.',
            'category.required' => 'Kategori produk wajib dipilih.',
            'category.exists' => 'Kategori yang dipilih tidak valid.',
            'name.required' => 'Nama produk wajib diisi.',
            'name.max' => 'Nama produk maksimal 100 karakter.',
            'no_barcode.required' => 'Barcode produk wajib diisi.',
            'no_barcode.unique' => 'Barcode sudah digunakan untuk produk lain.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh kurang dari 0.',
            'unit.required' => 'Unit produk wajib diisi.',
            'unit.max' => 'Unit produk maksimal 20 karakter.',
            'stock.integer' => 'Stok harus berupa angka.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',
            'image.required' => 'Foto produk wajib diupload.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2MB.'
        ]);

        try {
            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
            }

            // Handle unlimited stock
            $isUnlimited = $request->has('is_stock_unlimited') ? 1 : 0;
            $stock = $isUnlimited ? 0 : ($request->stock ?? 0);

            Product::create([
                'category_id' => $request->category,
                'umkm_id' => Auth::user()->umkm_id ?? 1, // Sesuaikan dengan sistem auth
                'name' => $request->name,
                'barcode' => $request->no_barcode,
                'price' => $request->price,
                'image' => $imagePath,
                'unit' => $request->unit,
                'is_unlimited' => $isUnlimited,
                'stock' => $stock,
                'status' => $request->status
            ]);

            return redirect()->route('admin.dashboard.product.katalog')
                           ->with('success', 'Produk berhasil ditambahkan!');

        } catch (\Exception $e) {
            // Delete uploaded image if product creation fails
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            
            return back()->withInput()
                        ->withErrors(['error' => 'Terjadi kesalahan saat menyimpan produk: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        
        // Get the type from category relationship
        $productType = $product->category->type ?? 'barang';
        
        return view('dashboard.product.katalog.edit', compact('product', 'categories', 'productType'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $product = Product::findOrFail($id);

        // Custom validation with Indonesian messages
        $request->validate([
            'type' => 'required|in:barang,jasa',
            'category' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:100',
            'no_barcode' => 'required|string|unique:products,barcode,' . $id,
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:20',
            'stock' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'type.required' => 'Tipe produk wajib dipilih.',
            'type.in' => 'Tipe produk harus berupa barang atau jasa.',
            'category.required' => 'Kategori produk wajib dipilih.',
            'category.exists' => 'Kategori yang dipilih tidak valid.',
            'name.required' => 'Nama produk wajib diisi.',
            'name.max' => 'Nama produk maksimal 100 karakter.',
            'no_barcode.required' => 'Barcode produk wajib diisi.',
            'no_barcode.unique' => 'Barcode sudah digunakan untuk produk lain.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh kurang dari 0.',
            'unit.required' => 'Unit produk wajib diisi.',
            'unit.max' => 'Unit produk maksimal 20 karakter.',
            'stock.integer' => 'Stok harus berupa angka.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2MB.'
        ]);

        try {
            // Handle image upload
            $imagePath = $product->image;
            if ($request->hasFile('image')) {
                // Delete old image
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                $imagePath = $request->file('image')->store('products', 'public');
            }

            // Handle unlimited stock
            $isUnlimited = $request->has('is_stock_unlimited') ? 1 : 0;
            $stock = $isUnlimited ? 0 : ($request->stock ?? 0);

            $product->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'barcode' => $request->no_barcode,
                'price' => $request->price,
                'image' => $imagePath,
                'unit' => $request->unit,
                'is_unlimited' => $isUnlimited,
                'stock' => $stock,
                'status' => $request->status
            ]);

            return redirect()->route('admin.dashboard.product.katalog')
                           ->with('success', 'Produk berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->withInput()
                        ->withErrors(['error' => 'Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage()]);
        }
    }

    public function updateStatus($id)
    {
        try {
            $product = Product::findOrFail($id);
            $newStatus = !$product->status;
            
            $product->update([
                'status' => $newStatus
            ]);

            $statusText = $newStatus ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.dashboard.product.katalog')
                           ->with('success', "Produk {$product->name} berhasil {$statusText}!");

        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard.product.katalog')
                           ->withErrors(['error' => 'Terjadi kesalahan saat mengubah status produk.']);
        }
    }

    public function updateStock(Request $request, $id)
    {
        // Custom validation with Indonesian messages
        $request->validate([
            'stock' => 'required|integer|min:0'
        ], [
            'stock.required' => 'Stok wajib diisi.',
            'stock.integer' => 'Stok harus berupa angka.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.'
        ]);

        try {
            $product = Product::findOrFail($id);
            
            // Don't update stock if it's unlimited
            if ($product->is_unlimited) {
                return redirect()->route('admin.dashboard.product.katalog')
                               ->withErrors(['error' => 'Tidak dapat mengubah stok produk unlimited.']);
            }

            $product->update([
                'stock' => $request->stock
            ]);

            return redirect()->route('admin.dashboard.product.katalog')
                           ->with('success', "Stok produk {$product->name} berhasil diperbarui menjadi {$request->stock} {$product->unit}!");

        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard.product.katalog')
                           ->withErrors(['error' => 'Terjadi kesalahan saat memperbarui stok produk.']);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            
            // Check if product is used in transactions
            if ($product->transactionItems()->exists()) {
                return redirect()->route('admin.dashboard.product.katalog')
                               ->withErrors(['error' => 'Produk tidak dapat dihapus karena sudah digunakan dalam transaksi.']);
            }
            
            // Delete associated image
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $productName = $product->name;
            $product->delete();

            return redirect()->route('admin.dashboard.product.katalog')
                           ->with('success', "Produk {$productName} berhasil dihapus!");

        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard.product.katalog')
                           ->withErrors(['error' => 'Terjadi kesalahan saat menghapus produk: ' . $e->getMessage()]);
        }
    }
}
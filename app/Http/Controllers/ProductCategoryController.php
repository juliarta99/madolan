<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductCategory::withCount('products');
        
        // TODO: Ganti dengan Auth::user()->umkm->id setelah implementasi login
        $query->where('umkm_id', 1);
        
        // Search functionality
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        // Filter by type
        if ($request->type) {
            $query->where('type', $request->type);
        }
        
        // Sorting functionality
        if ($request->sort_by) {
            switch ($request->sort_by) {
                case 'terlama':
                    $query->oldest();
                    break;
                case 'terbaru':
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }
        
        $categories = $query->paginate(10)->withQueryString();
        
        return view('dashboard.product.kategori.index', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:barang,jasa'
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori maksimal 100 karakter.',
            'type.required' => 'Tipe kategori wajib dipilih.',
            'type.in' => 'Tipe kategori harus berupa Barang atau Jasa.'
        ]);
        
        try {
            ProductCategory::create([
                'umkm_id' => 1, // TODO: Ganti dengan Auth::user()->umkm->id setelah implementasi login
                'name' => $request->name,
                'type' => $request->type
            ]);
            
            return redirect()->back()->with('success', 'Kategori produk berhasil ditambahkan.');
        } catch (\Throwable $th) {
            Log::error('Error creating product category: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan kategori produk.');
        }
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:barang,jasa'
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori maksimal 100 karakter.',
            'type.required' => 'Tipe kategori wajib dipilih.',
            'type.in' => 'Tipe kategori harus berupa Barang atau Jasa.'
        ]);
        
        try {
            $category = ProductCategory::where('umkm_id', 1)->findOrFail($id); // TODO: Ganti umkm_id dengan Auth::user()->umkm->id
            $category->update([
                'name' => $request->name,
                'type' => $request->type
            ]);
            
            return redirect()->back()->with('success', 'Kategori produk berhasil diperbarui.');
        } catch (\Throwable $th) {
            Log::error('Error updating product category: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui kategori produk.');
        }
    }
    
    public function destroy($id)
    {
        try {
            $category = ProductCategory::where('umkm_id', 1)->findOrFail($id); // TODO: Ganti umkm_id dengan Auth::user()->umkm->id
            
            // Check if category has related products
            if ($category->products()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus kategori yang masih memiliki produk.');
            }
            
            $category->delete();
            
            return redirect()->back()->with('success', 'Kategori produk berhasil dihapus.');
        } catch (\Throwable $th) {
            Log::error('Error deleting product category: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus kategori produk.');
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\TransactionCategory;
use App\Models\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = TransactionCategory::with(['type', 'umkm'])
            ->withCount('transactions');

        if (Auth::user()->role === 'umkm') {
            $query->where('umkm_id', Auth::user()->id);
        }

        // Filter berdasarkan tipe keuangan
        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'terbaru');
        if ($sortBy === 'terlama') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $categories = $query->paginate(10)->withQueryString();

        // Get transaction types untuk dropdown
        $transactionTypes = TransactionType::orderBy('name')->get();

        return view('dashboard.keuangan.kategori.index', compact('categories', 'transactionTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:transaction_types,id',
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max' => 'Nama kategori maksimal 255 karakter',
            'type_id.required' => 'Tipe keuangan wajib dipilih',
            'type_id.exists' => 'Tipe keuangan tidak valid',
        ]);

        // Validasi duplikat nama dalam tipe yang sama
        $exists = TransactionCategory::where('name', $request->name)
            ->where('type_id', $request->type_id);

        if (Auth::user()->role === 'umkm') {
            $exists->where('umkm_id', Auth::user()->id);
        }

        if ($exists->exists()) {
            return back()->withErrors([
                'name' => 'Kategori dengan nama ini sudah ada dalam tipe keuangan yang sama'
            ])->withInput();
        }

        $data = [
            'name' => $request->name,
            'type_id' => $request->type_id,
        ];

        // Jika user adalah UMKM, tambahkan umkm_id
        if (Auth::user()->role === 'umkm') {
            $data['umkm_id'] = Auth::user()->id;
        }

        TransactionCategory::create($data);

        return redirect()->route('admin.dashboard.keuangan.kategori')
            ->with('success', 'Kategori keuangan berhasil ditambahkan');
    }

    public function update(Request $request, TransactionCategory $category)
    {
        // Check authorization
        // if (Auth::user()->role === 'umkm' && $category->umkm_id !== Auth::user()->umkm->id) {
        //     abort(403, 'Unauthorized action.');
        // }

        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:transaction_types,id',
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max' => 'Nama kategori maksimal 255 karakter',
            'type_id.required' => 'Tipe keuangan wajib dipilih',
            'type_id.exists' => 'Tipe keuangan tidak valid',
        ]);

        // Validasi duplikat nama dalam tipe yang sama (kecuali dirinya sendiri)
        $exists = TransactionCategory::where('name', $request->name)
            ->where('type_id', $request->type_id)
            ->where('id', '!=', $category->id);

        if (Auth::user()->role === 'umkm') {
            $exists->where('umkm_id', Auth::user()->id);
        }

        if ($exists->exists()) {
            return back()->withErrors([
                'name' => 'Kategori dengan nama ini sudah ada dalam tipe keuangan yang sama'
            ])->withInput()
            ->with('edit_category_id', $category->id);
        }

        $category->update([
            'name' => $request->name,
            'type_id' => $request->type_id,
        ]);

        return redirect()->route('admin.dashboard.keuangan.kategori')
            ->with('success', 'Kategori keuangan berhasil diperbarui');
    }

    public function destroy(TransactionCategory $category)
    {
        // Check authorization
        // if (Auth::user()->role === 'umkm' && $category->umkm_id !== Auth::user()->umkm->id) {
        //     abort(403, 'Unauthorized action.');
        // }

        // Check if category has transactions
        if ($category->transactions()->count() > 0) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih memiliki transaksi');
        }

        $category->delete();

        return redirect()->route('admin.dashboard.keuangan.kategori')
            ->with('success', 'Kategori keuangan berhasil dihapus');
    }
}

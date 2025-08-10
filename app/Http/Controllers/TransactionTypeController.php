<?php

namespace App\Http\Controllers;

use App\Models\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionTypeController extends Controller
{
    public function index(Request $request)
    {
        $query = TransactionType::withCount('categories');
        
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $types = $query->paginate(10)->withQueryString();
        
        return view('dashboard.keuangan.type.index', compact('types'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:transaction_types,name'
        ], [
            'name.required' => 'Nama tipe keuangan wajib diisi.',
            'name.string' => 'Nama tipe keuangan harus berupa teks.',
            'name.max' => 'Nama tipe keuangan maksimal 100 karakter.',
            'name.unique' => 'Nama tipe keuangan sudah ada.'
        ]);
        
        try {
            TransactionType::create([
                'name' => $request->name
            ]);
            
            return redirect()->back()->with('success', 'Tipe keuangan berhasil ditambahkan.');
        } catch (\Throwable $th) {
            Log::error('Error creating transaction type: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan tipe keuangan.');
        }
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:transaction_types,name,' . $id
        ], [
            'name.required' => 'Nama tipe keuangan wajib diisi.',
            'name.string' => 'Nama tipe keuangan harus berupa teks.',
            'name.max' => 'Nama tipe keuangan maksimal 100 karakter.',
            'name.unique' => 'Nama tipe keuangan sudah ada.'
        ]);
        
        try {
            $type = TransactionType::findOrFail($id);
            $type->update([
                'name' => $request->name
            ]);
            
            return redirect()->back()->with('success', 'Tipe keuangan berhasil diperbarui.');
        } catch (\Throwable $th) {
            Log::error('Error updating transaction type: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui tipe keuangan.');
        }
    }
    
    public function destroy($id)
    {
        try {
            $type = TransactionType::findOrFail($id);
            
            if ($type->categories()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus tipe keuangan yang masih memiliki kategori.');
            }
            
            $type->delete();
            
            return redirect()->back()->with('success', 'Tipe keuangan berhasil dihapus.');
        } catch (\Throwable $th) {
            Log::error('Error deleting transaction type: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus tipe keuangan.');
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\FundingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FundingTypeController extends Controller
{
    public function index(Request $request)
    {
        $query = FundingType::withCount('fundings');
        
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $fundingTypes = $query->paginate(10)->withQueryString();
        
        return view('dashboard.pendanaan.type.index', compact('fundingTypes'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:funding_types,name'
        ], [
            'name.required' => 'Nama tipe pendanaan wajib diisi.',
            'name.string' => 'Nama tipe pendanaan harus berupa teks.',
            'name.max' => 'Nama tipe pendanaan maksimal 100 karakter.',
            'name.unique' => 'Nama tipe pendanaan sudah ada.'
        ]);
        
        try {
            FundingType::create([
                'name' => $request->name
            ]);
            
            return redirect()->back()->with('success', 'Tipe pendanaan berhasil ditambahkan.');
        } catch (\Throwable $th) {
            Log::error('Error creating funding type: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan tipe pendanaan.');
        }
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:funding_types,name,' . $id
        ], [
            'name.required' => 'Nama tipe pendanaan wajib diisi.',
            'name.string' => 'Nama tipe pendanaan harus berupa teks.',
            'name.max' => 'Nama tipe pendanaan maksimal 100 karakter.',
            'name.unique' => 'Nama tipe pendanaan sudah ada.'
        ]);
        
        try {
            $fundingType = FundingType::findOrFail($id);
            $fundingType->update([
                'name' => $request->name
            ]);
            
            return redirect()->back()->with('success', 'Tipe pendanaan berhasil diperbarui.');
        } catch (\Throwable $th) {
            Log::error('Error updating funding type: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui tipe pendanaan.');
        }
    }
    
    public function destroy($id)
    {
        try {
            $fundingType = FundingType::findOrFail($id);
            
            if ($fundingType->fundings()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus tipe pendanaan yang masih memiliki informasi pendanaan.');
            }
            
            $fundingType->delete();
            
            return redirect()->back()->with('success', 'Tipe pendanaan berhasil dihapus.');
        } catch (\Throwable $th) {
            Log::error('Error deleting funding type: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus tipe pendanaan.');
        }
    }
}
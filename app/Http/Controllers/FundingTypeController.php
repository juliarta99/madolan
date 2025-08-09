<?php

namespace App\Http\Controllers;

use App\Models\FundingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FundingTypeController extends Controller
{
    public function index(Request $request)
    {
        $query = FundingType::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $fundingTypes = $query->latest()->paginate(10);

        return view('dashboard.pendanaan.type.index', compact('fundingTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        try {
            FundingType::create([
                'name' => $request->name
            ]);

            return redirect()->back()->with('success', 'Tipe pendanaan berhasil ditambahkan.');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error', 'Gagal menambahkan tipe pendanaan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        try {
            $fundingType = FundingType::findOrFail($id);
            $fundingType->update([
                'name' => $request->name
            ]);

            return redirect()->back()->with('success', 'Tipe pendanaan berhasil diperbarui.');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error', 'Gagal memperbarui tipe pendanaan.');
        }
    }

    public function destroy($id)
    {
        try {
            $fundingType = FundingType::findOrFail($id);
            $fundingType->delete();

            return redirect()->back()->with('success', 'Tipe pendanaan berhasil dihapus.');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error', 'Gagal menghapus tipe pendanaan.');
        }
    }
}

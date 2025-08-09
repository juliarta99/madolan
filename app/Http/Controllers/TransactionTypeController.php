<?php

namespace App\Http\Controllers;

use App\Models\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionTypeController extends Controller
{
    public function index(Request $request)
    {
        $query = TransactionType::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $types = $query->latest()->paginate(10);

        return view('dashboard.keuangan.type.index', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        try {
            TransactionType::create([
                'name' => $request->name
            ]);

            return redirect()->back()->with('success', 'Tipe keuangan berhasil ditambahkan.');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error', 'Gagal menambahkan tipe keuangan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        try {
            $type = TransactionType::findOrFail($id);
            $type->update([
                'name' => $request->name
            ]);

            return redirect()->back()->with('success', 'Tipe keuangan berhasil diperbarui.');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error', 'Gagal memperbarui tipe keuangan.');
        }
    }

    public function destroy($id)
    {
        try {
            $type = TransactionType::findOrFail($id);
            $type->delete();

            return redirect()->back()->with('success', 'Tipe keuangan berhasil dihapus.');
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error', 'Gagal menghapus tipe keuangan.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::withCount(['ai_consultations', 'forums', 'learningResources']);

        // Handle search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Handle sorting
        $sortBy = $request->get('sort_by', 'terbaru');
        switch ($sortBy) {
            case 'terlama':
                $query->oldest();
                break;
            case 'terbaru':
            default:
                $query->latest();
                break;
        }

        // Paginate results
        $categories = $query->paginate(10)->withQueryString();

        return view('dashboard.learning.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.unique' => 'Nama kategori sudah ada',
            'name.max' => 'Nama kategori maksimal 255 karakter',
        ]);

        try {
            Category::create([
                'name' => $request->name,
                // slug akan auto-generate oleh Sluggable trait
            ]);

            return redirect()->route('admin.dashboard.learning.category')
                ->with('success', 'Kategori berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menambah kategori')
                ->withInput();
        }
    }

    public function update(Request $request, Category $kategori)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $kategori->id,
        ], [
            'name.required' => 'Nama kategori harus diisi',
            'name.unique' => 'Nama kategori sudah ada',
            'name.max' => 'Nama kategori maksimal 255 karakter',
        ]);

        try {
            $kategori->update([
                'name' => $request->name,
                // slug akan auto-update oleh Sluggable trait
            ]);

            return redirect()->route('admin.dashboard.learning.category')
                ->with('success', 'Kategori berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui kategori')
                ->withInput();
        }
    }

    public function destroy(Category $kategori)
    {
        try {
            // Check if category is being used
            $aiConsultationCount = $kategori->ai_consultations()->count();
            $forumCount = $kategori->forums()->count();
            $learningResourceCount = $kategori->learningResources()->count();

            if ($aiConsultationCount > 0 || $forumCount > 0 || $learningResourceCount > 0) {
                return redirect()->back()
                    ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan di AI Consultation, Forum, atau Learning Resource');
            }

            $kategori->delete();

            return redirect()->route('admin.dashboard.learning.category')
                ->with('success', 'Kategori berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus kategori');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AiConsultation;
use App\Models\Category;
use App\Services\AiConsultationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AiConsultationController extends Controller
{
    protected $aiService;

    public function __construct(AiConsultationService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function index(?string $categorySlug = null)
    {
        $categories = Category::all();
        $selectedCategory = null;
        $messages = [];
        
        if ($categorySlug) {
            $selectedCategory = Category::where('slug', $categorySlug)->first();
            if ($selectedCategory) {
                $messages = AiConsultation::forUserAndCategory(
                    Auth::user()->id ?? 1,
                    $selectedCategory->id
                )->get();
            }
        }

        return view('consultation.chat', compact('categories', 'messages', 'selectedCategory'));
    }

    public function sendMessage(Request $request)
    {
        // Validasi input
        $request->validate([
            'message' => 'required|string|max:1000',
            'category_id' => 'required|exists:categories,id'
        ]);

        $category = Category::find($request->category_id);
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan'
            ], 404);
        }

        DB::beginTransaction();
        try {
            // Simpan pesan user
            $userMessage = AiConsultation::create([
                'category_id' => $category->id,
                'user_id' => Auth::user()->id ?? 1,
                'chat' => $request->message,
                'role' => 'user'
            ]);

            // Dapatkan context chat sebelumnya (10 pesan terakhir)
            $chatContext = AiConsultation::getChatContext(
                Auth::user()->id ?? 1,
                $category->id,
                10
            );

            // Generate AI response menggunakan slug
            $aiResponse = $this->aiService->generateResponse(
                $request->message,
                $category->slug,
                $chatContext
            );

            // Simpan response AI
            $aiMessage = AiConsultation::create([
                'category_id' => $category->id,
                'user_id' => Auth::user()->id ?? 1,
                'chat' => $aiResponse,
                'role' => 'ai'
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'user_message' => $userMessage,
                'ai_response' => $aiMessage
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('AI Consultation Error: ' . $e->getMessage(), [
                'user_id' => Auth::user()->id ?? 1,
                'category_id' => $category->id,
                'message' => $request->message
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses pesan. Silakan coba lagi. '. $e->getMessage()
            ], 500);
        }
    }

    public function clearChat(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id'
        ]);

        try {
            $deleted = AiConsultation::where('user_id', Auth::user()->id ?? 1)
                ->where('category_id', $request->category_id)
                ->delete();

            return response()->json([
                'success' => true,
                'message' => "Berhasil menghapus {$deleted} pesan chat"
            ]);

        } catch (\Exception $e) {
            Log::error('Clear Chat Error: ' . $e->getMessage(), [
                'user_id' => Auth::user()->id ?? 1,
                'category_id' => $request->category_id
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus chat'
            ], 500);
        }
    }
}
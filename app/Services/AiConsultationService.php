<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class AiConsultationService
{
    protected $apiKey;
    protected $apiUrl;
    protected $maxRetries = 3;
    protected $timeoutSeconds = 30;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');
        $this->apiUrl = config('services.gemini.url', 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent');
        
        if (empty($this->apiKey)) {
            Log::error('Gemini API key not configured');
        }
    }

    public function generateResponse($userMessage, $categorySlug, Collection $chatContext = null)
    {
        // Validasi input
        if (empty($userMessage) || empty($categorySlug)) {
            return "Maaf, terjadi kesalahan dalam memproses pertanyaan Anda. Silakan coba lagi.";
        }

        $category = Category::where('slug', $categorySlug)->first();
        if (!$category) {
            return "Maaf, kategori tidak ditemukan. Silakan pilih kategori yang tersedia.";
        }

        // Cek apakah API key tersedia
        if (empty($this->apiKey)) {
            return $this->getFallbackResponse($categorySlug, $userMessage);
        }

        $systemPrompt = $this->buildSystemPrompt($category, $chatContext);
        $contents = $this->buildContents($systemPrompt, $chatContext, $userMessage);

        // Coba generate response dengan retry mechanism
        for ($attempt = 1; $attempt <= $this->maxRetries; $attempt++) {
            try {
                $response = $this->callGeminiApi($contents);
                
                if ($response) {
                    // Log successful response
                    Log::info('AI Response Generated Successfully', [
                        'category' => $categorySlug,
                        'attempt' => $attempt,
                        'user_message_length' => strlen($userMessage),
                        'response_length' => strlen($response)
                    ]);
                    
                    return $response;
                }
                
            } catch (\Exception $e) {
                Log::warning("Gemini API attempt {$attempt} failed", [
                    'error' => $e->getMessage(),
                    'category' => $categorySlug
                ]);
                
                if ($attempt === $this->maxRetries) {
                    Log::error('All Gemini API attempts failed', [
                        'category' => $categorySlug,
                        'user_message' => $userMessage
                    ]);
                }
                
                // Tunggu sebentar sebelum retry
                sleep(1);
            }
        }

        // Jika semua attempt gagal, gunakan fallback response
        return $this->getFallbackResponse($categorySlug, $userMessage);
    }

    protected function buildContents($systemPrompt, Collection $chatContext = null, $userMessage = '')
    {
        $contents = [];
        
        // Add system prompt as initial user message
        $contents[] = [
            'role' => 'user',
            'parts' => [
                ['text' => $systemPrompt]
            ]
        ];
        
        // Add a model acknowledgment to establish the system context
        $contents[] = [
            'role' => 'model',
            'parts' => [
                ['text' => 'Understood. I will act as your UMKM business consultant according to the guidelines provided.']
            ]
        ];

        // Add chat context (last 4 exchanges to stay within token limits)
        $chatContext = $chatContext ?? collect();
        foreach ($chatContext->take(-4) as $context) {
            if ($context->role === 'user') {
                $contents[] = [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $context->chat]
                    ]
                ];
            } else {
                $contents[] = [
                    'role' => 'model',
                    'parts' => [
                        ['text' => $context->chat]
                    ]
                ];
            }
        }

        // Add current user message
        if (!empty($userMessage)) {
            $contents[] = [
                'role' => 'user',
                'parts' => [
                    ['text' => $userMessage]
                ]
            ];
        }

        return $contents;
    }

    protected function callGeminiApi($contents)
    {
        // Validate contents structure before sending
        foreach ($contents as $content) {
            if (!isset($content['role']) || !in_array($content['role'], ['user', 'model'])) {
                Log::error('Invalid content role structure', ['content' => $content]);
                return false;
            }
        }

        $response = Http::timeout($this->timeoutSeconds)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'X-goog-api-key' => $this->apiKey,
            ])
            ->post($this->apiUrl, [
                'contents' => $contents,
                'generationConfig' => [
                    'temperature' => 0.8,
                    'maxOutputTokens' => 1500,
                    'topK' => 40,
                    'topP' => 0.95,
                    'candidateCount' => 1,
                    'stopSequences' => []
                ],
                'safetySettings' => [
                    [
                        'category' => 'HARM_CATEGORY_HARASSMENT',
                        'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
                    ],
                    [
                        'category' => 'HARM_CATEGORY_HATE_SPEECH',
                        'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
                    ]
                ]
            ]);

        if ($response->successful()) {
            $data = $response->json();
            
            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                $aiText = $data['candidates'][0]['content']['parts'][0]['text'];
                
                // Clean up response
                $aiText = trim($aiText);
                $aiText = str_replace('Assistant: ', '', $aiText);
                
                return $aiText;
            }
            
            Log::warning('Unexpected Gemini API response structure', [
                'response' => $data
            ]);
        } else {
            // Enhanced error logging with more details
            $errorData = $response->json();
            Log::error('Gemini API Error', [
                'status' => $response->status(),
                'response' => $response->body(),
                'error_code' => $errorData['error']['code'] ?? 'unknown',
                'error_message' => $errorData['error']['message'] ?? 'unknown',
                'contents_count' => count($contents)
            ]);
        }

        return false;
    }

    protected function buildSystemPrompt($category, Collection $chatContext = null)
    {
        return AiPromptTemplates::getSystemPrompt($category->slug, $chatContext);
    }

    protected function getFallbackResponse($categorySlug, $userMessage)
    {
        $category = Category::where('slug', $categorySlug)->first();
        $fallbackResponses = [
            'marketing' => [
                'Untuk strategi marketing UMKM yang efektif, saya sarankan fokus pada media sosial seperti Instagram dan TikTok karena biayanya terjangkau dan jangkauannya luas. Buatlah konten yang menunjukkan proses pembuatan produk, testimoni pelanggan, dan cerita di balik brand Anda. Konsistensi posting dan interaksi dengan followers adalah kunci utama! 📱✨',
                
                'Manfaatkan WhatsApp Business untuk komunikasi langsung dengan pelanggan dan Facebook/Instagram Ads dengan budget minimal Rp 50.000 untuk targeting yang tepat sasaran. Yang terpenting adalah memberikan value dalam setiap konten dan membangun relationship yang kuat dengan audience! 💪',
                
                'Untuk branding yang kuat dengan budget terbatas, gunakan Canva untuk membuat desain yang konsisten. Pastikan warna, font, dan style yang sama di semua platform. Ingat, word of mouth masih yang paling powerful untuk UMKM - berikan pelayanan terbaik dan pelanggan akan menjadi ambassador brand Anda! 🎨'
            ],
            
            'finance' => [
                'Pengelolaan keuangan yang sehat dimulai dari pemisahan rekening pribadi dan bisnis. Catat semua transaksi menggunakan aplikasi seperti BukuWarung atau spreadsheet sederhana. Hitung HPP (Harga Pokok Penjualan) dengan teliti dan sisihkan minimal 10% keuntungan untuk dana darurat usaha. 💰📊',
                
                'Untuk pricing yang optimal, pastikan sudah memasukkan semua biaya (bahan baku, tenaga kerja, overhead) ditambah margin keuntungan minimal 30%. Jangan takut menaikkan harga jika kualitas produk sudah baik - customer akan membayar untuk value yang mereka terima! 📈',
                
                'Buat laporan keuangan sederhana setiap bulan: pemasukan, pengeluaran, keuntungan bersih, dan cash flow. Evaluasi tren penjualan untuk membuat keputusan bisnis yang tepat. Planning keuangan 3-6 bulan ke depan sangat penting untuk sustainability usaha! 💡'
            ],
            
            'production' => [
                'Optimasi produksi dimulai dari standarisasi proses. Buat SOP (Standard Operating Procedure) sederhana untuk setiap tahap produksi agar kualitas konsisten. Implementasikan quality control checkpoints dan catat waste untuk identifikasi area improvement. ⚙️',
                
                'Untuk efficiency, analisis workflow dan eliminasi bottleneck dalam proses produksi. Investasi dalam tools atau equipment yang dapat meningkatkan produktivitas jangka panjang. Training tim produksi secara berkala untuk maintain standar kualitas! 🔧',
                
                'Manajemen inventory yang baik dengan sistem first-in-first-out (FIFO) untuk raw materials. Hitung safety stock yang optimal dan bangun relationship yang baik dengan supplier untuk ensure continuity produksi. 📦'
            ],
            
            'legal' => [
                'Untuk legalitas usaha, mulai dengan mengurus NIB (Nomor Induk Berusaha) melalui OSS online di oss.go.id. Siapkan KTP, NPWP, dan dokumen pendukung lainnya. Proses biasanya 1-3 hari kerja dan gratis. Legalitas yang lengkap membuka akses ke berbagai program pemerintah! ⚖️',
                
                'Daftarkan merek dagang Anda di DJKI untuk perlindungan hukum. Buat kontrak kerja yang jelas untuk karyawan dan perjanjian kerjasama dengan supplier/partner bisnis. Konsultasi dengan ahli hukum untuk compliance yang tepat! 📋',
                
                'Pastikan compliance perpajakan dengan lapor SPT tahunan dan bayar pajak sesuai omzet. Untuk e-commerce, pahami regulasi platform dan perlindungan konsumen. Documentation yang rapi akan membantu jika ada audit atau dispute! 📄'
            ],
            
            'technology' => [
                'Mulai digitalisasi dengan platform e-commerce gratis seperti Shopee, Tokopedia, atau Bukalapak. Upload foto produk berkualitas tinggi, tulis deskripsi yang menarik, dan manfaatkan fitur promosi platform. Konsistensi update dan response time yang cepat adalah kunci! 💻',
                
                'Implementasikan sistem pembayaran digital seperti QRIS untuk kemudahan customer. Gunakan Google Workspace untuk produktivitas dan Canva untuk design kebutuhan marketing. WhatsApp Business dengan fitur katalog dan auto-reply sangat membantu customer service! 📱',
                
                'Buat website sederhana atau landing page menggunakan platform seperti WordPress atau Wix. Integrate dengan social media dan e-commerce untuk omnichannel experience. Analytics tools seperti Google Analytics membantu understand customer behavior! 🌐'
            ],
            
            'hr' => [
                'Rekrutmen karyawan yang tepat dimulai dari job description yang clear dan proses interview yang terstruktur. Berikan training yang adequate dan buat sistem evaluasi performance yang fair. Communication yang terbuka dan regular feedback sangat penting! 👥',
                
                'Ciptakan company culture yang positif dengan recognition program sederhana seperti employee of the month. Libatkan karyawan dalam decision making dan berikan development opportunity. Team yang happy akan lebih productive dan loyal! 🏆',
                
                'Buat sistem penggajian yang transparan dan fair dengan komponen yang jelas. Berikan benefit sesuai kemampuan perusahaan seperti bonus performance atau tunjangan kesehatan. Work-life balance yang baik akan meningkatkan retention rate! 💼'
            ],
            
            'strategy' => [
                'Gunakan Business Model Canvas untuk mapping strategi bisnis secara visual. Identifikasi value proposition yang unique, customer segments yang tepat, dan revenue streams yang diversified. Regular review dan adjustment strategi sesuai market dynamics! 🎯',
                
                'Lakukan competitor analysis sederhana: siapa mereka, apa kelebihan/kekurangan, bagaimana positioning mereka. Temukan blue ocean atau niche market yang belum tergarap. Differentiation adalah kunci untuk stand out dari kompetisi! 🔍',
                
                'Buat roadmap pengembangan 1-3 tahun dengan milestone yang clear dan measurable. Fokus pada sustainable growth daripada rapid expansion. Risk management dengan contingency plan untuk berbagai skenario bisnis! 🗺️'
            ],
            
            'export-import' => [
                'Persiapan ekspor dimulai dari research pasar target dan requirement produk di negara tujuan. Pastikan produk sudah memenuhi standar internasional dan siapkan dokumen seperti certificate of origin, invoice, dan packing list. Government support melalui DJPEN sangat membantu! 🌍',
                
                'Untuk finding buyers, manfaatkan platform seperti Alibaba, trade shows virtual/physical, dan network dengan eksportir lain. Pricing untuk ekspor harus include semua cost seperti packaging, shipping, insurance, dan margin yang reasonable! 📦',
                
                'Build relationship yang strong dengan freight forwarder dan customs broker untuk smooth logistics. Understanding Incoterms dan payment terms yang aman seperti L/C sangat crucial. Start small dengan negara tetangga untuk learning experience! 🚢'
            ]
        ];

        $responses = $fallbackResponses[$categorySlug] ?? $fallbackResponses['marketing'];
        $response = $responses[array_rand($responses)];
        
        // Tambahkan personalisasi berdasarkan pertanyaan user
        $keywords = $this->extractKeywords($userMessage);
        if (!empty($keywords)) {
            $response .= "\n\nSaya melihat Anda bertanya tentang " . implode(', ', $keywords) . ". Bisa jelaskan lebih detail tentang situasi atau tantangan spesifik yang Anda hadapi? Dengan informasi lebih lengkap, saya dapat memberikan advice yang lebih targeted! 🤔";
        }
        
        return $response;
    }

    protected function extractKeywords($message)
    {
        $keywords = [];
        $message = strtolower($message);
        
        $keywordMap = [
            'harga' => 'pricing',
            'jual' => 'penjualan', 
            'pelanggan' => 'customer',
            'marketing' => 'pemasaran',
            'sosial media' => 'social media',
            'keuangan' => 'financial management',
            'modal' => 'capital',
            'karyawan' => 'manajemen SDM',
            'produksi' => 'production',
            'kualitas' => 'quality control',
            'ekspor' => 'export',
            'online' => 'digital marketing'
        ];
        
        foreach ($keywordMap as $keyword => $label) {
            if (strpos($message, $keyword) !== false) {
                $keywords[] = $label;
            }
        }
        
        return array_slice($keywords, 0, 3);
    }
}
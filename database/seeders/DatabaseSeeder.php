<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\FundingType;
use App\Models\Mentor;
use App\Models\ProductCategory;
use App\Models\TransactionCategory;
use App\Models\TransactionType;
use App\Models\Umkm;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Marketing & Pemasaran',
                'slug' => 'marketing',
            ],
            [
                'name' => 'Keuangan & Akuntansi',
                'slug' => 'finance',
            ],
            [
                'name' => 'Produksi & Operasional',
                'slug' => 'production',
            ],
            [
                'name' => 'Legal & Perizinan',
                'slug' => 'legal',
            ],
            [
                'name' => 'Teknologi & Digital',
                'slug' => 'technology',
            ],
            [
                'name' => 'Sumber Daya Manusia',
                'slug' => 'hr',
            ],
            [
                'name' => 'Strategi Bisnis',
                'slug' => 'strategy',
            ],
            [
                'name' => 'Export & Import',
                'slug' => 'export-import',
            ]
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        $fundingTypes = [
            [
                'name' => 'KUR (Kredit Usaha Rakyat)',
                'slug' => 'kur'
            ],
            [
                'name' => 'Modal Ventura',
                'slug' => 'modal-ventura'
            ],
            [
                'name' => 'Crowdfunding',
                'slug' => 'crowdfunding'
            ],
            [
                'name' => 'Pembiayaan Syariah',
                'slug' => 'pembiayaan-syariah'
            ],
            [
                'name' => 'Investor Swasta',
                'slug' => 'investor-swasta'
            ],
            [
                'name' => 'Hibah',
                'slug' => 'hibah'
            ],
            [
                'name' => 'Pinjaman Bank',
                'slug' => 'pinjaman-bank'
            ],
            [
                'name' => 'Pendanaan Pemerintah',
                'slug' => 'pendanaan-pemerintah'
            ]
        ];

        foreach ($fundingTypes as $fundingType) {
            FundingType::firstOrCreate(
                ['slug' => $fundingType['slug']],
                $fundingType
            );
        }

        $financialTypes = [
            [
                'name' => 'Pemasukan',
                'slug' => 'pemasukan'
            ],
            [
                'name' => 'Pengeluaran',
                'slug' => 'pengeluaran'
            ],
            [
                'name' => 'Hutang',
                'slug' => 'hutang'
            ],
            [
                'name' => 'Piutang',
                'slug' => 'piutang'
            ]
        ];

        foreach ($financialTypes as $financialType) {
            TransactionType::firstOrCreate(
                ['slug' => $financialType['slug']],
                $financialType
            );
        }


        $idTypePemasukan  = TransactionType::where('slug', 'pemasukan')->first()->id;
        $idTypePengeluaran = TransactionType::where('slug', 'pengeluaran')->first()->id;
        $idTypeHutang      = TransactionType::where('slug', 'hutang')->first()->id;
        $idTypePiutang     = TransactionType::where('slug', 'piutang')->first()->id;

        $transactionCategories = [
            // Pemasukan
            [
                'name' => 'Penjualan',
                'slug' => 'penjualan',
                'type_id' => $idTypePemasukan
            ],
            [
                'name' => 'Modal Masuk',
                'slug' => 'modal-masuk',
                'type_id' => $idTypePemasukan
            ],
            [
                'name' => 'Pendapatan Lain-lain',
                'slug' => 'pendapatan-lain',
                'type_id' => $idTypePemasukan
            ],

            // Pengeluaran
            [
                'name' => 'Pembelian Bahan Baku',
                'slug' => 'pembelian-bahan-baku',
                'type_id' => $idTypePengeluaran
            ],
            [
                'name' => 'Biaya Operasional',
                'slug' => 'biaya-operasional',
                'type_id' => $idTypePengeluaran
            ],
            [
                'name' => 'Gaji Karyawan',
                'slug' => 'gaji-karyawan',
                'type_id' => $idTypePengeluaran
            ],
            [
                'name' => 'Pengeluaran Lain-lain',
                'slug' => 'pengeluaran-lain',
                'type_id' => $idTypePengeluaran
            ],

            // Hutang
            [
                'name' => 'Pinjaman Bank',
                'slug' => 'pinjaman-bank',
                'type_id' => $idTypeHutang
            ],
            [
                'name' => 'Pinjaman Pribadi',
                'slug' => 'pinjaman-pribadi',
                'type_id' => $idTypeHutang
            ],

            // Piutang
            [
                'name' => 'Tagihan Penjualan',
                'slug' => 'tagihan-penjualan',
                'type_id' => $idTypePiutang
            ],
            [
                'name' => 'Piutang Lain-lain',
                'slug' => 'piutang-lain',
                'type_id' => $idTypePiutang
            ]
        ];

        foreach ($transactionCategories as $category) {
            TransactionCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        $productCategories = [
            [
                'name' => 'Makanan & Minuman',
                'slug' => 'makanan-minuman',
                'type' => 'barang'
            ],
            [
                'name' => 'Pakaian & Aksesoris',
                'slug' => 'pakaian-aksesoris',
                'type' => 'barang'
            ],
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'type' => 'barang'
            ],
            [
                'name' => 'Produk Kecantikan',
                'slug' => 'produk-kecantikan',
                'type' => 'barang'
            ],
            [
                'name' => 'Layanan Konsultasi',
                'slug' => 'layanan-konsultasi',
                'type' => 'jasa'
            ],
            [
                'name' => 'Jasa Pengiriman',
                'slug' => 'jasa-pengiriman',
                'type' => 'jasa'
            ],
            [
                'name' => 'Perawatan & Kebersihan',
                'slug' => 'perawatan-kebersihan',
                'type' => 'jasa'
            ]
        ];

        foreach ($productCategories as $category) {
            ProductCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }


        // Admin
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'no_handphone' => '0811111111',
                'gender' => 'M',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Mentor
        $mentorUser = User::firstOrCreate(
            ['email' => 'mentor@example.com'],
            [
                'name' => 'Mentor Sukses',
                'email' => 'mentor@example.com',
                'no_handphone' => '0822222222',
                'gender' => 'M',
                'password' => Hash::make('password'),
                'role' => 'mentor',
                'email_verified_at' => now(),
            ]
        );

        Mentor::firstOrCreate(
            ['user_id' => $mentorUser->id],
            [
                'portfolio' => 'mentor/portfolio/portfolio.pdf',
                'is_approve' => true,
                'ig_url' => 'https://instagram.com/mentor',
                'linkedin_url' => 'https://linkedin.com/in/mentor'
            ]
        );

        // UMKM Users
        $umkmUsers = [
            [
                'name' => 'UMKM 1',
                'email' => 'umkm1@example.com',
                'no_handphone' => '0833333333',
                'gender' => 'F'
            ],
            [
                'name' => 'UMKM 2',
                'email' => 'umkm2@example.com',
                'no_handphone' => '0844444444',
                'gender' => 'M'
            ],
            [
                'name' => 'UMKM 3',
                'email' => 'umkm3@example.com',
                'no_handphone' => '0855555555',
                'gender' => 'F'
            ]
        ];

        foreach ($umkmUsers as $index => $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'no_handphone' => $data['no_handphone'],
                    'gender' => $data['gender'],
                    'password' => Hash::make('password'),
                    'role' => 'umkm',
                    'email_verified_at' => now(),
                ]
            );

            Umkm::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'name' => 'Usaha ' . $data['name'],
                    'location' => 'Jl. Contoh No. ' . ($index + 1),
                    'umkm_photo' => 'umkm/foto/umkm'. $index .'.jpg',
                    'since' => 2020,
                    'business_cash' => 5000000,
                    'regency' => 'Badung',
                    'province' => 'Bali',
                    'is_approve' => true,
                    'logo' => 'logo.jpg'
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
    }
}

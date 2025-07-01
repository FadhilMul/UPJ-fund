<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Bencana Alam',
            'Balita dan Anak',
            'Bantuan Medis dan Kesehatan',
            'Pendidikan',
            'Lingkungan',
            'Sosial',
            'Infrastruktur',
            'Karya Kreatif',
            'Modal Usaha',
            'Zakat',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}

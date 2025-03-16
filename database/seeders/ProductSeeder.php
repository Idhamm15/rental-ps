<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Produk 1: Auto Cartoning
        $product1Id = DB::table('category_products')->insertGetId([
            'name' => 'PS 4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $product2Id = DB::table('category_products')->insertGetId([
            'name' => 'PS 5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Sub-produk untuk Auto Cartoning
        DB::table('products')->insert([
            // PS4
            [
                'category_product_id' => $product1Id,
                'name' => 'PS4 - Set 1 (TV 32")',
                'image' => 'test1.webp',
                'price' => 15000,
                'description' => 'Paket PS4 dengan TV 32 inci, nyaman untuk 1-2 pemain.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_product_id' => $product1Id,
                'name' => 'PS4 - Booth A (AC + Sofa)',
                'image' => 'test2.jpeg',
                'price' => 20000,
                'description' => 'Booth nyaman dilengkapi AC dan sofa, cocok untuk sesi gaming yang lama.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_product_id' => $product1Id,
                'name' => 'PS4 - Set 3 (TV 40" LED)',
                'image' => 'test3.jpg',
                'price' => 18000,
                'description' => 'PS4 dengan TV LED 40 inci, kualitas gambar lebih jernih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // PS5
            [
                'category_product_id' => $product2Id,
                'name' => 'PS5 - VIP Room (Smart TV 50")',
                'image' => 'test4.jpg',
                'price' => 30000,
                'description' => 'Ruang eksklusif dengan PS5, Smart TV, dan kursi nyaman.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_product_id' => $product2Id,
                'name' => 'PS5 - Set 1 (TV 43" UHD)',
                'image' => 'test1.webp',
                'price' => 25000,
                'description' => 'Pengalaman bermain PS5 dengan TV UHD 43 inci.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_product_id' => $product2Id,
                'name' => 'PS5 - Booth B (Sound System)',
                'image' => 'test3.jpg',
                'price' => 28000,
                'description' => 'PS5 lengkap dengan sound system, cocok untuk main game action.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

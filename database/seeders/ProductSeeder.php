<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Image;
use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Mukena', 'Gamis', 'Hijab', 'Abaya'];

        for ($i = 0; $i < 20; $i++) {
            // Membuat data produk
            $product = Product::create([
                'name' => 'Product ' . $i,
                'description' => 'Description for Product ' . $i,
                'price' => rand(1000, 10000),
                'category' => $categories[array_rand($categories)],
                'url_shopee' => 'https://shopee.com/product' . $i,
                'url_tokped' => 'https://tokopedia.com/product' . $i,
                'url_wa' => 'https://wa.me/628123456789' . $i,
                'slug' => Str::slug('Product ' . $i),
                'user_id' => rand(1, 10),
            ]);

            // Menambahkan beberapa gambar untuk produk ini
            for ($j = 0; $j < 6; $j++) {
                Image::create([
                    'name' => 'https://picsum.photos/300/300?random=' . ($i * 10 + $j), // Gambar acak Lorem Picsum
                    'product_id' => $product->id,
                ]);
            }

            // Menambahkan beberapa warna untuk produk ini
            $colors = ['Merah', 'Biru', 'Hijau', 'Abu', 'Hitam', 'Putih'];
            for ($k = 0; $k < 3; $k++) {
                Color::create([
                    'name' => $colors[array_rand($colors)], // Warna acak
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}

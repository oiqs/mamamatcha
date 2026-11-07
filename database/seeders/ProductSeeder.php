<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['Matcha Latte',        'matcha-latte', 25000, 'Matcha dengan susu segar.'],
            ['Iced Matcha Latte',   'matcha-latte', 27000, 'Matcha latte dingin dengan es.'],
            ['Matcha Cloud',        'matcha-series', 30000, 'Matcha dengan cold foam lembut.'],
            ['Matcha Strawberry',   'matcha-series', 32000, 'Matcha dengan saus stroberi.'],
            ['Matcha Coconut',      'matcha-series', 30000, 'Matcha dengan santan kelapa.'],
            ['Matcha Oat Milk',     'non-coffee', 33000, 'Matcha dengan susu oat.'],
            ['Matcha Cheese Foam',  'non-coffee', 31000, 'Matcha dengan cheese foam gurih.'],
            ['Extra Boba',          'topping', 5000, 'Tambahan boba.'],
            ['Extra Shot Matcha',   'topping', 8000, 'Tambahan satu shot matcha.'],
        ];

        foreach ($items as [$name, $categorySlug, $price, $desc]) {
            Product::create([
                'category_id' => Category::where('slug', $categorySlug)->value('id'),
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $desc,
                'price' => $price,
                'stock' => 50,
                'is_active' => true,
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $product1 = Product::create([
            'name' => 'Bamburi Cement',
            'unit' => 'kgs',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        ]);

        $product1->category()->create([
            'name' => 'Cement',
        ]);
    }
}

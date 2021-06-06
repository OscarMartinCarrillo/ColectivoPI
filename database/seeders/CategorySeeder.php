<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre' => "General",
            'user_id'=>3
        ]);
        Category::create([
            'nombre' => "Preguntas",
            'user_id'=>3
        ]);
        Category::create([
            'nombre' => "Compra/Venta",
            'user_id'=>3
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::create([
            'nombre' => "Debe de estar en el General 1",
            'category_id'=>1,
            'user_id'=>3
        ]);
        Theme::create([
            'nombre' => "Debe de estar en el General 2",
            'category_id'=>1,
            'user_id'=>3
        ]);
        Theme::create([
            'nombre' => "Debe de estar en el Preguntas 1",
            'category_id'=>2,
            'user_id'=>3
        ]);
        Theme::create([
            'nombre' => "Debe de estar en el Preguntas 2",
            'category_id'=>2,
            'user_id'=>3
        ]);
        Theme::create([
            'nombre' => "Debe de estar en el Compra/Venta 1",
            'category_id'=>3,
            'user_id'=>3
        ]);
        Theme::create([
            'nombre' => "Debe de estar en el Compra/Venta 2",
            'category_id'=>3,
            'user_id'=>3
        ]);
    }
}

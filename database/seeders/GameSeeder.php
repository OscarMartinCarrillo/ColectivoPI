<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'nombre' => "Nombre Juego 1",
            'descripcion' => "Descripcion juego 1 autentico",
            'minduracion' => 20,
            'maxduracion' => 20,
            'dificultad' => "Medio",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>2
        ]);
        Game::create([
            'nombre' => "Nombre Juego 2",
            'descripcion' => "Descripcion juego 2",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Dificil",
            'edad' => 15,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>2
        ]);
        Game::create([
            'nombre' => "Nombre Juego 3",
            'descripcion' => "Descripcion juego 3",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Medio",
            'edad' => 12,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>4
        ]);
        Game::create([
            'nombre' => "Nombre Juego 4",
            'descripcion' => "Descripcion juego 4",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Medio",
            'edad' => 21,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>6
        ]);
        Game::create([
            'nombre' => "Nombre Juego 5",
            'descripcion' => "Descripcion juego 5",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Facil",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>3
        ]);
        Game::create([
            'nombre' => "Nombre Juego 6",
            'descripcion' => "Descripcion juego 6",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Dificil",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>1
        ]);
        Game::create([
            'nombre' => "Nombre Juego 7",
            'descripcion' => "Descripcion juego 7",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Medio",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>2
        ]);
        Game::create([
            'nombre' => "Nombre Juego 8",
            'descripcion' => "Descripcion juego 8",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Facil",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>8
        ]);
        Game::create([
            'nombre' => "Nombre Juego 9",
            'descripcion' => "Dificil",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Medio",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>7
        ]);
        Game::create([
            'nombre' => "Nombre Juego 10",
            'descripcion' => "Descripcion juego 10",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Medio",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>8
        ]);
        Game::create([
            'nombre' => "Nombre Juego 11",
            'descripcion' => "Descripcion juego 11",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Medio",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>7
        ]);
        Game::create([
            'nombre' => "Nombre Juego 12",
            'descripcion' => "Descripcion juego 12",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Dificil",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>5
        ]);
        Game::create([
            'nombre' => "Nombre Juego 13",
            'descripcion' => "Descripcion juego 13",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Facil",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>6
        ]);
        Game::create([
            'nombre' => "Nombre Juego 14",
            'descripcion' => "Descripcion juego 14",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Medio",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>6
        ]);
        Game::create([
            'nombre' => "Nombre Juego 15",
            'descripcion' => "Descripcion juego 15",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Medio",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>6
        ]);
        Game::create([
            'nombre' => "Nombre Juego 16",
            'descripcion' => "Descripcion juego 16",
            'minduracion' => 20,
            'maxduracion' => 40,
            'dificultad' => "Dificil",
            'edad' => 5,
            'minjugadores' => 1,
            'maxjugadores' => 2,
            'type_id'=>6
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'nombre_rol' => "Default",
            'descripcion'=>"No puedes modificar, ni crear juegos ni actividades."
        ]);
        Role::create([
            'nombre_rol' => "Admin",
            'descripcion'=>"Puedes crear y modificar Actividades."
        ]);
        Role::create([
            'nombre_rol' => "SuperAdmin",
            'descripcion'=>"Puedes crear y modificar Actividades y acceso a usuarios."
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'normal',
            'email'=>'normal@normal.es',
            'email_verified_at'=>now(),
            'password'=>Hash::make('secret0')
        ]);
        User::create([
            'name'=>'admin',
            'email'=>'admin@admin.es',
            'email_verified_at'=>now(),
            'password'=>Hash::make('secret0'),
            'role_id'=>2
        ]);
        User::create([
            'name'=>'superadmin',
            'email'=>'superadmin@superadmin.es',
            'email_verified_at'=>now(),
            'password'=>Hash::make('secret0'),
            'role_id'=>3
        ]);
    }
}

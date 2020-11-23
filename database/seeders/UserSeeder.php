<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => env('ADMIN_NAME', 'admin'),
            'email'    => env('ADMIN_EMAIL', 'admin@blog.com'),
            'password' => env('ADMIN_PASSWORD', Hash::make('password')),
        ]);
    }
}

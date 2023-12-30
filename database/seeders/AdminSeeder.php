<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // $this->call([UserSeeder::class,]);
     DB::table('users')->insert([
        'name' => 'Yash',
        'email' => '06yashsharma@gmail.com',
        'password' => Hash::make('0000'),
        'status' => 'active',
        'type' => 'admin',
    ]);
    }
}

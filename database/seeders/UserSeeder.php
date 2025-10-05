<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'admin',
            'email'  => 'admin@gmail.com',
            'phone'  => '01020828482',
            'role'   => 'admin',
            'password'  => bcrypt('12345678'),
        ]);
    }
}

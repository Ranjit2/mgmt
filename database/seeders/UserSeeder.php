<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a single user
        User::create([
            'name' => 'Your Name',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}

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
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'zmraupov@gmail.com'],
            [
                'role_id' => 1,
                'email'=>'zmraupov@gmail.com',
                'name' => 'Azim',
                'password' => bcrypt('password'),
            ]
        );
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Example User',
            'surname' => 'Example User1',
            'patronymic' => 'Example User1',
            'age' => '12',
            'address' => 'dasdsa',
            'gender' => '1',
            'role' => '1',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // Зашифруйте пароль
        ]);
    }
}

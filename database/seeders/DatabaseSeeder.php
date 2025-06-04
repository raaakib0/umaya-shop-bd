<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'raaakib0@gmail.com'],
            [
                'name' => 'Rakibul Islam',
                'email_verified_at' => now(),
                'password' => Hash::make('rakib@123'),
                'remember_token' => Str::random(10),
                'is_admin' => 1,
            ]
        );
if (!class_exists(\Database\Seeders\ProductSeeder::class)) {
    throw new \Exception('ProductSeeder class does not exist!');
}
        $this->call([
            ProductSeeder::class,
        ]);
    }
}

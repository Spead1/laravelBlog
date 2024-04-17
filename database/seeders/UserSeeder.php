<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i= 0; $i <= 10; $i++) {
        $faker = Factory::create();
        User::create([
            'email' => $faker->email,
            'name' => $faker->name,
            'password' => Hash::make('password'),
            'role' => User::USER_ROLE,
        ]);
    }
    }
}

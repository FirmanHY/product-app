<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1111'),
                'role' => 'admin',
                'status' => 'active',
                'photo' => null,
                'provider' => null,
                'provider_id' => null,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('1111'),
                'role' => 'user',
                'status' => 'active',
                'photo' => null,
                'provider' => null,
                'provider_id' => null,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
        ];

     
        collect($users)->each(function ($user) {
            User::create($user);
        });
    }
}
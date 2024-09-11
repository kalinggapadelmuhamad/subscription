<?php

namespace Database\Seeders;

use App\Models\Subcription;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'uuid' => Str::uuid(),
            'privilege' => false,
            'username' => 'admin',
            'password' => Hash::make('password'),
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'phone' => '08123456789',
        ]);

        Subcription::create([
            'uuid' => Str::uuid(),
            'user_id' => 1,
            'token' =>  strtoupper(Str::random(64)),
            'duration' => 10,
            'end_date' => now()->addDays(10),
        ]);
    }
}

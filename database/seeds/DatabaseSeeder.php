<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('Password123'),
        ]);
    }
}

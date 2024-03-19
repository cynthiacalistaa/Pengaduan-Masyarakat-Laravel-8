<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // tambahkan data admin
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('password123');
        $user->role = 'admin';
        $user->save();
    }
}

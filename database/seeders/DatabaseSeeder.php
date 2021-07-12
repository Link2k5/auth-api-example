<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(1)->create([
             'name' => 'Samuel Gomes',
             'email' => 'samuel.codeapp@gmail.com',
             'password' => Hash::make('12345678'),
         ]);
    }
}

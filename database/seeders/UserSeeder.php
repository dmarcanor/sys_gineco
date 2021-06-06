<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'email' => env('GMAIL_FIRST_USER'),
            'password' => bcrypt(env('PSSW_FIRST_USER')),
        ]);
    }
}

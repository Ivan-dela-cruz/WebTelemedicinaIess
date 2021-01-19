<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\User::insert([
            [
                'ci' => '1750474049',
                'type_document'=>'cedula',
                'name' => 'Mário Guimarães',
                'email' => 'contato@marioguimaraes.com.br',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'last_name' => 'sn',
                'address' => 'sn',
                'phone' => '1234567890',
                'url_image' => '#',
                'status' => 'activo',
                'remember_token' => Str::random(10)
            ]
        ]);

        // Fake users
       // User::factory()->times(9)->create();
    }
}


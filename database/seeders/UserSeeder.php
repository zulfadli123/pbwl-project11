<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'pos' => 'POS',
            'hp' => '081276675434',
            'role' => 1,
            'aktif' => 1,
            'alamat' => 'This is Alamat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

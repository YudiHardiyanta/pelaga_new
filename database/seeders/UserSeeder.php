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
        //
        User::create([
            'name' => 'I Komang Yudi Hardiyanta',
            'email' => 'admin@admin.com',
            'nik' => '5171042406960003',
            'kk' => '5171042406960003',
            'jk' => 'L',
            'is_active' => TRUE,
            'password' => Hash::make('5171042406960003')
        ]);
    }
}

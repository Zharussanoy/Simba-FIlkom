<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert([
            [
                'name'       => 'Admin SIMBA',
                'email'      => 'admin@simba.filkom',
                'nim'        => null,
                'password'   => Hash::make('password123'),
                'role'       => 'security',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Azharus',
                'email'      => 'azharus@security.simba',
                'nim'        => null,
                'password'   => Hash::make('password123'),
                'role'       => 'security',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Mahasiswa Test',
                'email'      => 'test@student.ub.ac.id',
                'nim'        => '245150601111010',
                'password'   => Hash::make('password123'),
                'role'       => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
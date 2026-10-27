<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Akun Admin BPBD Tetap
        User::updateOrCreate(
            ['email' => 'admin.bpbd@bandungkab.go.id'],
            [
                'name' => 'Admin BPBD Kabupaten Bandung',
                'password' => Hash::make('password123'),
            ]
        );

        // 5 Akun Dummy Petugas menggunakan Faker
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'),
            ]);
        }
    }
}
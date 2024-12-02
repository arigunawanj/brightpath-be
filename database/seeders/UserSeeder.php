<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        UserModel::truncate();
        Schema::enableForeignKeyConstraints();

        // $faker = Faker::create('id_ID');

        $data = [
            [
                'name' => 'Ari Gunawan',
                'email' => 'arigunawanjatmiko@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'superadmin',
            ],
            [
                'name' => 'Siswa',
                'email' => 'siswa@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'siswa',
            ],
            [
                'name' => 'Guru',
                'email' => 'guru@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'guru',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],
        ];

        foreach($data as $item){
            UserModel::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => $item['password'],
                'role' => $item['role'],
            ]);
        }
    }
}

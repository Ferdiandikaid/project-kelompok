<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Andhika Ferdiansyah',
            'email' => 'andhikaf@gmail.com',
            'deskripsi' => 'lorem ipsum',
            'password' => 'anjaymabar123',
        ]);
    }
}

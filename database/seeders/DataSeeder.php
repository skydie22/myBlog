<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'name' => 'admin',
            'username' => 'skydie',
            'password' => bcrypt('password')
        ]);


        Kategori::Create([
            'nama' => 'teknologi'
        ]);

        Posts::Create([
            'judul' => 'belajar laravel',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe ducimus ut sint exercitationem iure? Non ut libero impedit illo, accusamus iusto veritatis architecto molestiae at minus alias quibusdam dolorem dolor?',
            'kategori_id' => 1
        ]);
    }
}

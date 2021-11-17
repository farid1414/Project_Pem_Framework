<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'nama' =>"aksi",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama'=>"komedy",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' =>"drama",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama'=>"horor",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        \DB::table('genres')->insert($post);
    }
}
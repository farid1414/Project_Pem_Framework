<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
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
                'nama' =>"webinar",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' =>"workshop",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' =>"film",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' =>"konser",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        \DB::table('kategoris')->insert($post);
    }
}
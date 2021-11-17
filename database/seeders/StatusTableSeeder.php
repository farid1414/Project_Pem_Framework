<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post =[
            [
                'nama' =>"antri",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' =>"sukses",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' =>"gagal",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        \DB::table('status')->insert($post);
    }
}
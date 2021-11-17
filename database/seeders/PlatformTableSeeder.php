<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlatformTableSeeder extends Seeder
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
                'name'=>"zoom",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' =>"youtube",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name'=>"google meet",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name'=>"microsoft teams",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name'=>"sonar platform",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        \DB::table('platforms')->insert($post);
    }
}
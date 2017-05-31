<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = array(
            array(
                'id' => 1,
                'name' => 'Brood',
                'parent_id' => null,
                'visible' => 1
            ),
            array(
                'id' => 2,
                'name' => 'Gebak',
                'parent_id' => null,
                'visible' => 1
            ),
            array(
                'id' => 3,
                'name' => 'Taart',
                'parent_id' => 2,
                'visible' => 1
            ),
            array(
                'id' => 4,
                'name' => 'Donuts',
                'parent_id' => 2,
                'visible' => 1
            ),
            array(
                'id' => 5,
                'name' => 'Bruin',
                'parent_id' => 1,
                'visible' => 1
            ),
            array(
                'id' => 6,
                'name' => 'Wit',
                'parent_id' => 1,
                'visible' => 1
            ),
        );

        DB::table('categories')->insert($categories);
    }
}

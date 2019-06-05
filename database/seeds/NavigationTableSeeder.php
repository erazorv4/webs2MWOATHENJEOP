<?php

use Illuminate\Database\Seeder;

class NavigationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header_navigations')->delete();

        $header_navigation = array(
            array(
                'id' => 1,
                'name' => 'Webshop',
                'link_as' => 'winkel',
                'parent_id' => null,
                'priority' => 3,
                'visible' => 1
            ),
            array(
                'id' => 2,
                'name' => 'Over ons',
                'link_as' => 'about',
                'parent_id' => null,
                'priority' => 2,
                'visible' => 1
            ),
            array(
                'id' => 3,
                'name' => 'Winkelwagen',
                'link_as' => 'winkelwagen',
                'parent_id' => null,
                'priority' => 1,
                'visible' => 1
            ),
        );

        DB::table('header_navigations')->insert($header_navigation);
    }
}

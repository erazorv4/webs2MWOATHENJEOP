<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('products')->delete();
        
        $products = array(
            array(
                'id' => 1,
                'name' => "Appeltaart",
                'price' => 12.40,
                'description' => "Dit is een appeltaart!",
                'category_id' => 3
            ),
            array(
                'id' => 2,
                'name' => "Wit heel brood",
                'price' => 40.12,
                'description' => "Heel erg wit!",
                'category_id' => 6
            ),
            array(
                'id' => 3,
                'name' => "Kersentaart",
                'price' => 9.95,
                'description' => "Een lekker taartje met kersen erop.",
                'category_id' => 3
            ),
            array(
                'id' => 4,
                'name' => "Minitaart",
                'price' => 0.01,
                'description' => "Minitaartje 🎂.",
                'category_id' => 3
            ),
            array(
                'id' => 5,
                'name' => "Donut naturel",
                'price' => 40.12,
                'description' => "Donut zonder iets erop of eraan.",
                'category_id' => 6
            ),
            array(
                'id' => 6,
                'name' => "Donut met magentha icing",
                'price' => 40.12,
                'description' => "Een magentha donut, dus lekkerder!",
                'category_id' => 6
            ),
            array(
                'id' => 7,
                'name' => "Aardbeien donut",
                'price' => 0.75,
                'description' => "Donut gevult met een heerlijke aarbijen jam.",
                'category_id' => 4
            ),
            array(
                'id' => 8,
                'name' => "Tijgerbrood",
                'price' => 0.75,
                'description' => "Rawr",
                'category_id' => 6
            ),
            array(
                'id' => 9,
                'name' => "MWOATHENBRØT",
                'price' => 6.9,
                'description' => "MWOAHTEN!!!",
                'category_id' => 5
            ),
            array(
                'id' => 10,
                'name' => "Kattenbrood",
                'price' => 0.75,
                'description' => "Mrauw",
                'category_id' => 1
            ),

        );
        
        DB::table('products')->insert($products);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Pizza;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        for ($i = 0; $i < 8; $i++) {
            Pizza::create([
                'name' => $faker->title,
                'description' => $faker->paragraph,
                'image' => '',
                'price' => $faker->randomNumber(2),
            ]);
        }
    }
}

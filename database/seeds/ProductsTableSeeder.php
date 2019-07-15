<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert([
                'sku' => $faker->randomNumber($nbDigits = 6, $strict = false), 
                'name' => $faker->unique()->name,
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.89, $max = 99),
                'special_price' => NULL,
                'image' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}

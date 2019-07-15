<?php

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            'rate' => "21",
            'status' => 1,
            'discount' => 0,
            'discount_type' => 0
        ]);
    }
}

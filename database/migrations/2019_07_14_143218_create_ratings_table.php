<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('rating');
            $table->morphs('rateable');
            $table->index('rateable_id');
            $table->index('rateable_type');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
       
    Schema::drop('ratings');
   
       
    }
}

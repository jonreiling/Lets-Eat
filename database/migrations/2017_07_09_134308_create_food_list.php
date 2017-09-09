<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('food_list', function (Blueprint $table) {
           
            $table->increments('id');
            $table->unsignedInteger('order');
            $table->unsignedInteger('list_id');
            $table->unsignedInteger('food_id');
            $table->timestamps();
            
            //Set up foreign key for deletion...
            $table->foreign('list_id')
                  ->references('id')->on('lists')
                  ->onDelete('cascade');      

            $table->foreign('food_id')
                  ->references('id')->on('foods')
                  ->onDelete('cascade');

        });        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('food_list');
    }
}

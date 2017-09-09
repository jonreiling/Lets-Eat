<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUserGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_user_group', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('user_group_id');
            $table->timestamps();

            //Set up foreign key for deletion...
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');      

            $table->foreign('user_group_id')
                  ->references('id')->on('user_groups')
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
        Schema::dropIfExists('user_user_groups');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('session_user', function (Blueprint $table) {
            
            $table->increments('id');              
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('user_id');

            //Set up foreign key for deletion...
            $table->foreign('session_id')
                  ->references('id')->on('sessions')
                  ->onDelete('cascade');     

            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('session_user');
    }
}

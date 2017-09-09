<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionInvitations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('session_invitations', function (Blueprint $table) {
            $table->increments('id');              
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('sender_id');
            $table->string('hash');
            $table->timestamps();

            //Set up foreign key for deletion...
            $table->foreign('session_id')
                  ->references('id')->on('sessions')
                  ->onDelete('cascade');     

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');      

            $table->foreign('sender_id')
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
        Schema::dropIfExists('session_invitations');
    }
}

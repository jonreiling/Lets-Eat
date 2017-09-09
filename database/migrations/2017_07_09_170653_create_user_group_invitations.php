<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupInvitations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_group_invitations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('user_id');
            $table->enum('status', ['pending', 'accepted', 'declined']);

            $table->timestamps();

            $table->foreign('creator_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('user_group_invitations');

    }
}

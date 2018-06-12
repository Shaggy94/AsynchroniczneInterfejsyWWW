<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic')->nullable();
            $table->integer('message_id')->unsigned()->nullable();
            $table->integer('message_author_id')->unsigned();
            $table->integer('message_receiver_id')->unsigned();
            $table->integer('status');
            $table->text('message');
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table){
            $table->foreign('message_author_id')->references('id')->on('users');
            $table->foreign('message_receiver_id')->references('id')->on('users');
            $table->foreign('message_id')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

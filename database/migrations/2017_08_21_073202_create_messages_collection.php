<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->integer('sender_id')->unsigned();
            $collection->integer('receiver_id')->unsigned();
            $collection->tinyInteger('type');  //value 0 for file,1 for image,2 for video and 3 for text
            $collection->tinyInteger('seen')->default('0'); //value 0 for unseen and 1 for seen
            $collection->timestamps();
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

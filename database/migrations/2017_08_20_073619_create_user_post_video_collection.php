<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPostVideoCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post_video', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->integer('fk_user_post_id')->unsigned();
            $collection->string('video');
            $collection->string('caption',150);
            $collection->tinyInteger('status')->default('0');  //value 0 for unapproval
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
        Schema::dropIfExists('user_post_video');
    }
}

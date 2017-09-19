<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPostImageCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post_image', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->integer('fk_user_post_id')->unsigned();
            $collection->string('images',255);
            $collection->string('caption',150);
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
        Schema::dropIfExists('user_post_image');
    }
}

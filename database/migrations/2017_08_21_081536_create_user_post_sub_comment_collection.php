<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPostSubCommentCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post_sub_comment', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->integer('fk_post_sub_comment_id')->unsigned();
            $collection->injteger('fk_user_id')->unsigned();
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
        Schema::dropIfExists('user_post_sub_comment');
    }
}

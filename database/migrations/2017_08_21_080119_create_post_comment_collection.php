<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->integer('fk_post_id')->unsigned();
            $collection->tinyInteger('type'); // 0 for user,1 for admin
            $collection->tinyInteger('comment_type'); // 0 for user,1 for admin
            $collection->text('comment');
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
        Schema::dropIfExists('post_comment');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPostSubCommentCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_post_sub_comment', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->integer('fk_post_sub_comment_id')->unsigned();
            $collection->injteger('fk_admin_id')->unsigned();
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
        Schema::dropIfExists('admin_post_sub_comment');
    }
}

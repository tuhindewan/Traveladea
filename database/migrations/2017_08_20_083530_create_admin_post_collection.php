<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPostCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_post', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->string('headline',255);
            $collection->text('description');
            // $collection->dateTime('start_date_time');
            // $collection->dateTime('end_date_time');
            // $collection->string('gps',100);
            $collection->string('tag',100);
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
        Schema::dropIfExists('admin_post');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->string('username',20)->unique();
            $collection->string('email',50)->unique();
            $collection->string('password',255);
            $collection->integer('phone',15);
            $collection->string('country_code',7);
            $collection->string('gender');
            $collection->string('firstname',50);
            $collection->string('middlename',50)->nullable();
            $collection->string('lastname',50);
            $collection->tinyInteger('verifiedstatus')->default('0'); // value 0 for non-verified or no macth verified code in email
            $collection->tinyInteger('status')->default('1'); // value 0 for inactive
            $collection->integer('fk_city_id')->unsigned();
            $collection->integer('fk_image_id')->unsigned();
            $collection->foreign('fk_image_id')->references('_id')->on('user_profile_image');
            $collection->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

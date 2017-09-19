<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPackageCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_package', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->integer('fk_company_id')->unsigned();
            $collection->string('headline',150);
            $collection->text('description');
            $collection->string('gps',100);
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
        Schema::dropIfExists('company_package');
    }
}

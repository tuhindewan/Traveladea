<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyServiceAccessCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_service_access', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->integer('fk_company_id')->unsigned();
            $collection->integer('fk_service_id')->unsigned();
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
        Schema::dropIfExists('company_service_access');
    }
}

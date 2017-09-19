<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $collection) {
            $collection->increments('id');
            $collection->string('company_name',150);
            $collection->text('address');
            $collection->date('years_of_operation');
            $collection->string('license_key',150);
            $collection->string('website',100);
            $collection->sting('phone',15);
            $collection->text('description');
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
        Schema::dropIfExists('companies');
    }
}

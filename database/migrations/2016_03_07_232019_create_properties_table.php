<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('listingId');
            $table->string('propertyType');
            $table->string('streetNumber');
            $table->string('streetName');
            $table->string('city');
            $table->string('postalCode');
            $table->double('approximateAcreage');
            $table->double('value');
            $table->string('yearBuilt');
            $table->string('state');
            $table->string('listPrice');
            $table->string('listingStatus');
            $table->string('originalListPrice');
            $table->string('propertyDescription');
            $table->integer('totalBaths');
            $table->integer('lotSqft');
            $table->integer('bedrooms');
            $table->string('waterHeaterDescription');
            $table->string('garageDescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('properties');
    }
}

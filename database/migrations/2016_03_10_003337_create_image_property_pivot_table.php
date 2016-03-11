<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagePropertyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_property', function (Blueprint $table) {
            $table->integer('image_id')->unsigned()->index();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->integer('property_id')->unsigned()->index();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->primary(['image_id', 'property_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('image_property');
    }
}

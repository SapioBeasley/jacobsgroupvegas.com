<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingAgentPropertyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_agent_property', function (Blueprint $table) {
            $table->integer('listing_agent_id')->unsigned()->index();
            $table->foreign('listing_agent_id')->references('id')->on('listing_agents')->onDelete('cascade');
            $table->integer('property_id')->unsigned()->index();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->primary(['listing_agent_id', 'property_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listing_agent_property');
    }
}

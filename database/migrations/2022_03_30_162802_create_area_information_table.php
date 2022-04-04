<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('address_details');
            $table->string('phone', 20);
            $table->text('picture')->nullable();
            $table->integer('postal_code');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('area_information');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('manufactor_id')->unsigned();
            $table->bigInteger('device_type_id')->unsigned();
            $table->string('description');
            $table->string('image');
            $table->timestamps();
            $table->foreign('manufactor_id')->references('id')->on('manufactor')->onDelete('cascade');
            $table->foreign('device_type_id')->references('id')->on('device_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device');
    }
};

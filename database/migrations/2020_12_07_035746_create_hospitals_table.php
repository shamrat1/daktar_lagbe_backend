<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('branch_name')->nullable();
            $table->foreignId('address_id')->constrained()->nullable();
            $table->string('image')->nullable();
            $table->string('image_thumb')->nullable();
            $table->string('reception_phone')->nullable();
            // $table->string('name')->nullable();
            // $table->string('name')->nullable();
            // $table->string('name')->nullable();
            $table->boolean('isActive')->default(0);
            $table->string('location_lat')->nullable();
            $table->string('location_lng')->nullable();
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
        Schema::dropIfExists('hospitals');
    }
}

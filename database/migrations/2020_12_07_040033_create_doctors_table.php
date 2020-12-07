<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_bn')->nullable();
            $table->string('bmdc_code')->unique()->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('expertise_id')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            // $table->unsignedBigInteger('visit_hour_id')->nullable();
            // $table->unsignedBigInteger('visit_fee_id')->nullable();
            $table->string('extra_fee')->nullable();
            $table->string('phone')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}

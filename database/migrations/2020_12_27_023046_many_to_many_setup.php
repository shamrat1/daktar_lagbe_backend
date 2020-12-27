<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManyToManySetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_visit_hour', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->foreignId('visit_hour_id')->constrained()->onDelete('cascade');
        });

        Schema::create('doctor_visit_fee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->foreignId('visit_fee_id')->constrained()->onDelete('cascade');
        });

        Schema::create('hospital_service',function(Blueprint $table){
            $table->id();
            $table->foreignId('hospital_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
        });

        Schema::create('hospital_test_facility',function(Blueprint $table){
            $table->id();
            $table->foreignId('hospital_id')->constrained()->onDelete('cascade');
            $table->foreignId('test_facility_id')->constrained()->onDelete('cascade');
        });

        Schema::create('hospital_surgery',function(Blueprint $table){
            $table->id();
            $table->foreignId('hospital_id')->constrained()->onDelete('cascade');
            $table->foreignId('surgery_id')->constrained()->onDelete('cascade');
        });

        Schema::create('clinic_service',function(Blueprint $table){
            $table->id();
            $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
        });

        Schema::create('clinic_test_facility',function(Blueprint $table){
            $table->id();
            $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
            $table->foreignId('test_facility_id')->constrained()->onDelete('cascade');
        });

        Schema::create('clinic_surgery',function(Blueprint $table){
            $table->id();
            $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
            $table->foreignId('surgery_id')->constrained()->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("doctor_visit_hour");
        Schema::dropIfExists("doctor_visit_fee");
        Schema::dropIfExists("hospital_service");
        Schema::dropIfExists("hospital_test_facility");
        Schema::dropIfExists("hospital_surgery");
        Schema::dropIfExists("clinic_service");
        Schema::dropIfExists("clinic_test_facility");
        Schema::dropIfExists("clinic_surgery");
    }
}

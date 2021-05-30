<?php

use App\Models\Area;
use App\Models\City;
use App\Models\Division;
use App\Models\Doctor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorChambersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_chambers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Doctor::class,'doctor_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('name_bn')->nullable();
            $table->foreignIdFor(Division::class,'division_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(City::class,'city_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Area::class,'area_id')->constrained()->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('doctor_chambers');
    }
}

<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsInDoctors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->foreignIdFor(User::class,'user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('title')->nullable()->after('name_bn');
            $table->string('nid_passport_no')->nullable()->after('title');
            $table->string('date_of_birth')->nullable()->after('phone');
            $table->string('image')->nullable()->after('date_of_birth');
            $table->enum('gender',['Male','Female','Others','Prefer Not To Say'])->nullable()->after('image');

            $table->boolean('video_calling')->default(0);
            $table->boolean('voice_calling')->default(0);
            $table->boolean('chat')->default(0);
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropForeign('doctors_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('title');
            $table->dropColumn('nid_passport_no');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('image');
            $table->dropColumn('gender');
        });
    }
}

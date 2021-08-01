<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatlngColsInAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('lat')->after('address_line_2')->nullable();
            $table->string('lng')->after('lat')->nullable();
            $table->foreignIdFor(User::class,'user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('addresses_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
}

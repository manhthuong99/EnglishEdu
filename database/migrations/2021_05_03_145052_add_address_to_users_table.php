<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('province_id')->nullable(true)->after('type_login');
            $table->string('district_id')->nullable(true)->after('province_id');
            $table->string('address')->nullable(true)->after('district_id');
            $table->date('birthday')->nullable(true)->after('address');
            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}

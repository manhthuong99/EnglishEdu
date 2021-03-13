<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFkForAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('english_center', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('user');
        });
        Schema::table('course', function (Blueprint $table) {
            $table->foreign('center_id')->references('center_id')->on('english_center');
        });
        Schema::table('area', function (Blueprint $table) {
            $table->foreign('center_id')->references('center_id')->on('english_center');
        });
        Schema::table('consulting', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('user');
        });
        Schema::table('report', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('user');
        });
        Schema::table('review', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('review', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEnglishCenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_center', function (Blueprint $table) {
            $table->increments('center_id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('website');
            $table->string('avatar')->default('center.jpg');
            $table->text('description')->nullable(true);
            $table->integer('area_id')->nullable(true);
            $table->float('ave_star')->default(3);
            $table->boolean('status')->default(1);
            $table->integer('province_id')->nullable(true);
            $table->integer('district_id')->nullable(true);
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
        Schema::dropIfExists('english_center');
    }
}

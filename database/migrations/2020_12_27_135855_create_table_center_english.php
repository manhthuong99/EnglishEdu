<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCenterEnglish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_english', function (Blueprint $table) {
            $table->increments('center_id');
            $table->string('center_name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('image');
            $table->text('description')->nullable(true);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('center_english');
    }
}

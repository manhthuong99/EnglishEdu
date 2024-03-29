<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableConsulting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulting', function (Blueprint $table) {
            $table->increments('consulting_id');
            $table->integer('center_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable(true);
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number')->nullable(true);
            $table->string('note')->nullable(true);
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
        Schema::dropIfExists('consulting');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCourseEnglish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_english', function (Blueprint $table) {
            $table->increments('course_id');
            $table->integer('center_id')->unsigned();
            $table->string('course_name');
            $table->string('type_education')->nullable(true);
            $table->string('time_study')->nullable(true);
            $table->boolean('try_study')->default(1);
            $table->date('time_start')->nullable(true);
            $table->double('price');
            $table->double('discount')->default(0);
            $table->text('description')->nullable(true);
            $table->integer('number_student')->nullable(true);
            $table->text('promotion')->nullable(true);
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
        Schema::dropIfExists('course_english');
    }
}

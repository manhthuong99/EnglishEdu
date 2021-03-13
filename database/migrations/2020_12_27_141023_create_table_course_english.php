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
        Schema::create('course', function (Blueprint $table) {
            $table->increments('course_id');
            $table->integer('center_id')->unsigned();
            $table->string('name');
            $table->double('price');
            $table->double('discount')->default(0);
            $table->string('type')->nullable(true);
            $table->integer('number_of_session')->nullable(true);
            $table->boolean('try_study')->default(1);
            $table->date('study_time')->nullable(true);
            $table->string('type_customer')->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('input_requirement')->nullable(true);
            $table->string('out_requirement')->nullable(true);
            $table->integer('input_point')->nullable(true);
            $table->integer('out_point')->nullable(true);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('course');
    }
}

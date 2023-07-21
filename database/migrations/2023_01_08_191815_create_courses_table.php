<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('category');
            $table->string('hours');
            $table->string('price');
            $table->longText('description');
            $table->unsignedBigInteger('prof_id');
            $table->string('photo');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('prof_id')->references('id')->on('professors')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->integer('id_card');
            $table->string('gender');
            $table->string('country');
            $table->string('city');
            $table->string('date_of_birth');
            $table->integer('phone_number');
            $table->string('email_address');
            $table->string('experience');
            $table->longText('LinkedIn');
            $table->string('photo');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();

          /*  $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('period_id')->unsigned();
            $table->string('name');
            $table->string('last_name');
            $table->string('ci');
            $table->string('email')->unique();
            $table->string('position');
            $table->string('address');
            $table->string('phone');
            $table->string('file', 128)->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('period_id')->references('id')->on('period_admins')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representatives');
    }
}

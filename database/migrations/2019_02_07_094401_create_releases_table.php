<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('meeting_id')->unsigned();
            $table->string ('slug',128)->unique();
            $table->text('body');
            $table->string('place', 255);
            $table->date('date');
            $table->time('hour');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_releases')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('releases');
    }
}

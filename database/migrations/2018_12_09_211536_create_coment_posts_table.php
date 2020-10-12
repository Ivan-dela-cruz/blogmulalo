<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coment_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_service_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->text('body');
            $table->timestamp('date_coment');
            $table->timestamps();

            $table->foreign('user_service_id')->references('id')->on('user_services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coment_posts');
    }
}

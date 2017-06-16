<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pt32_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->text('intro')->nullable();
            $table->text('full');
            $table->string('image');
            $table->string('status')->default(1);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('pt32_category')->onDelete('cascade');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('pt32_users')->onDelete('cascade');
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
        Schema::drop('pt32_news');
    }
}

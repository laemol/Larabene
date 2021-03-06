<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
        });

        Schema::create('articles', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(0);
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('slug');
            $table->date('date');
            $table->string('title');
            $table->string('image');
            $table->text('content');
            $table->string('tags');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('article_categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
        Schema::drop('article_categories');
    }
}

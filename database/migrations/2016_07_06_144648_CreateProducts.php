<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //название товара
            $table->string('url'); //url товара
            $table->string('price'); //цена товара
            $table->string('text'); //описание товара
            $table->string('keywords'); //ключевые слова
            $table->string('description'); //описание
            $table->string('title'); //заголовок
            $table->integer('id_category'); //id категории
            $table->integer('properties'); //свойства справочников
            $table->integer('img_one'); //фото1
            $table->integer('img_too'); //фото2
            $table->rememberToken();
            $table->softDeletes();
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
        //
    }
}

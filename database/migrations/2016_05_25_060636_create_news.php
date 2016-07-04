<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //название новости
            $table->string('url'); //url страницы
            $table->text('text'); //текст страницы
            $table->string('description');
            $table->string('keywords');
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

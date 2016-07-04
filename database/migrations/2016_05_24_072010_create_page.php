<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::create('page', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //название страницы
            $table->string('url'); //url страницы
            $table->text('text'); //текст страницы
            $table->string('position'); //позиция в меню
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

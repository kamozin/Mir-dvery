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
            $table->string('name'); //�������� ������
            $table->string('url'); //url ������
            $table->string('price'); //���� ������
            $table->string('text'); //�������� ������
            $table->string('keywords'); //�������� �����
            $table->string('description'); //��������
            $table->string('title'); //���������
            $table->integer('id_category'); //id ���������
            $table->integer('properties'); //�������� ������������
            $table->integer('img_one'); //����1
            $table->integer('img_too'); //����2
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

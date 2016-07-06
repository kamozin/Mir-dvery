<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHareckteristic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //�������� ��������������
            $table->string('img'); //�������� ��������������
            $table->integer('id_directory'); //id �����������
            $table->integer('id_razdel'); //id �������
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

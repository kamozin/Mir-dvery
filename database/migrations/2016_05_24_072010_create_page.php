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
            $table->string('name'); //�������� ��������
            $table->string('url'); //url ��������
            $table->text('text'); //����� ��������
            $table->string('position'); //������� � ����
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

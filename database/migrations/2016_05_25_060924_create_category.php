<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //�������� �����
            $table->string('url'); //url �����
            $table->string('parent_id'); //���� �����
            $table->string('text'); //����� �����
            $table->string('position');
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

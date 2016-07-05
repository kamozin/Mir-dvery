<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //название справочника
            $table->string('url'); //название справочника
            $table->text('text'); //название справочника
            $table->string('description'); //название справочника
            $table->string('keywords'); //название справочника
            $table->string('title'); //название справочника
            $table->string('img'); //название справочника
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

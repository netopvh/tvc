<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parceiro_id')->unsigned();
            $table->foreign('parceiro_id')->references('id')->on('parceiros');
            $table->date('data_limite')->nullable();
            $table->integer('clicks')->default(0);
            $table->string('imagem');
            $table->char('posicao',1);
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
		Schema::drop('banners');
	}

}

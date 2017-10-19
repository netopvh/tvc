<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->char('destaque',1);
            $table->longText('conteudo');
            $table->string('img_destaque')->nullable();
            $table->string('autor')->nullable();
            $table->string('fonte')->nullable();
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
		Schema::drop('noticias');
	}

}

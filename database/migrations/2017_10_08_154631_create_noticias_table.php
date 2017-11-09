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
            $table->string('slug');
            $table->string('titulo');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('noticia_categorias');
            $table->boolean('destaque')->default(false);
            $table->text('short_content');
            $table->longText('conteudo');
            $table->string('img_destaque')->nullable();
            $table->string('autor')->nullable();
            $table->string('fonte')->nullable();
            $table->boolean('publicado')->default(false);
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

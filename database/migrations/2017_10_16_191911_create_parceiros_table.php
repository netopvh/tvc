<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParceirosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parceiros', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->char('tp_pessoa',1)->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('responsavel')->nullable();
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
		Schema::drop('parceiros');
	}

}

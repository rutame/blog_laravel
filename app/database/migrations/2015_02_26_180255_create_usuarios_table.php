<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function($table){
            $table->increments('id');
            $table->string('nombre', 64);
            $table->string('telefono', 64);
            $table->string('foto', 64);
            $table->string('rol',32);
            $table->string('email', 64)->unique();
            $table->string('username', 64)->unique();
            $table->string('password', 64);
            $table->string('remember_token');
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
		Schema::drop('usuarios');
	}

}

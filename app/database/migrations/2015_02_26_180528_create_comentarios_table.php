<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('comentarios', function($table){
            $table->increments('id');
            $table->string('nombre');
            $table->text('comentario');
            $table->timestamps();

            // Relacion publicacion --> usuario (autor) 1 a muchos
            $table->integer('post_id')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comentarios');
    }

}

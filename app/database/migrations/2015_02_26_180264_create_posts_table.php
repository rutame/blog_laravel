<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function($table){
            $table->increments('id');
            $table->string('titulo', 64);
            $table->string('resumen');
            $table->date('fecha');
            $table->text('cuerpo');
            $table->text('foto');
            $table->text('username');

            $table->timestamps();

            // Relacion publicacion --> usuario (autor) 1 a muchos
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }

}

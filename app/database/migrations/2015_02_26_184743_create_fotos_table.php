<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('fotos', function($table){
            $table->increments('id');
            $table->string('foto', 64);
            $table->string('tags');
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
        Schema::drop('fotos');
    }


}

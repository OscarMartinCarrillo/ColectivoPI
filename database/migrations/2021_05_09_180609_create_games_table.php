<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('minduracion');
            $table->integer('maxduracion');
            $table->string('dificultad');
            $table->integer('edad');
            $table->integer('minjugadores');
            $table->integer('maxjugadores');
            $table->string('foto')->default('storage/img/games/default.jpg');
            $table->foreignId('type_id');

            $table->foreign('type_id')
                ->references('id')->on('types')
                ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('games');
    }
}

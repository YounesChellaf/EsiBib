<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->string('isbn');
            $table->string('langue');
            $table->string('annee_acqui');
            $table->string('annee_edition');
            $table->integer('nb_partie');
            $table->integer('nb_exemplaire');
            $table->integer('user_id');
            $table->integer('domaine_id');
            $table->integer('type_id');
            $table->integer('emplacement_id');
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
        Schema::dropIfExists('books');
    }
}

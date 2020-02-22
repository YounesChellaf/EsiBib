<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('book_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('card_student');
            $table->enum('statu',['draft','confirmed','rejected','fait']);
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
        Schema::dropIfExists('prises');
    }
}

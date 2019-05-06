<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConjugationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjugations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('word_id');
            $table->string('word');
            $table->unsignedBigInteger('pronoun_id');
            $table->timestamps();

            $table->foreign('word_id')->references('id')->on('words');
            $table->foreign('pronoun_id')->references('id')->on('pronouns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conjugations');
    }
}

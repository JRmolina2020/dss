<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('link',100);
            $table->string('type',20);
            $table->string('user',50);
            $table->longText('text');
            $table->integer('re');
            $table->integer('anger');
            $table->integer('disgust');
            $table->integer('fear');
            $table->integer('joy');
            $table->integer('surprise');
            $table->integer('neutro');
            $table->integer('sadness');
            $table->integer('pos');
            $table->integer('neg');
            $table->integer('mpos');
            $table->integer('mneg');
            $table->integer('ex');
            $table->integer('pre');
            $table->integer('se');
            $table->integer('es');

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
        Schema::dropIfExists('topics');
    }
}
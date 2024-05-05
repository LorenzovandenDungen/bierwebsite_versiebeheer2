<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBierTable extends Migration
{
    public function up()
    {
        Schema::create('bier', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->unsignedBigInteger('valt_onder_id')->nullable();
            $table->foreign('valt_onder_id')->references('id')->on('bier')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categorie');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bier');
    }
}
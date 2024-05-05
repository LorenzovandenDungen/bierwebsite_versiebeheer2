<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bier', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->unsignedBigInteger('valt_onder_id')->nullable();
            $table->unsignedBigInteger('categorie_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('valt_onder_id')->references('id')->on('bier')->onDelete('cascade');
            $table->foreign('categorie_id')->references('id')->on('categorie')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bier');
    }
}

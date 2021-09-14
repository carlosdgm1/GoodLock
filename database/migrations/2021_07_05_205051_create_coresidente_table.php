<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoresidenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coresidente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idr');
            $table->foreign('idr')->references('id')->on('residenets');
            $table->string('nombre');
            $table->string('relacion');
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
        Schema::dropIfExists('coresidente');
    }
}

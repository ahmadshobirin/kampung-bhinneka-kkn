<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemografisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demografis', function (Blueprint $table) {
            $table->id();
            $table->string("neighborhood");
            $table->integer("head_of_family");
            $table->integer("inhabitant");
            $table->integer("toddler");
            $table->integer("elderly");
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
        Schema::dropIfExists('demografis');
    }
}

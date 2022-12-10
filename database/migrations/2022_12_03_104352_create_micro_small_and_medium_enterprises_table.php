<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroSmallAndMediumEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micro_small_and_medium_enterprises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('demografis_id');
            $table->string('nib')->nullable();
            $table->string('name');
            $table->string('pic');
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('address');
            $table->string('business_type');
            $table->text('description');
            $table->enum('status', ['created', 'published', 'unlisted', 'archived'])->default('created');
            $table->timestamps();

            $table->foreign('demografis_id')->references('id')->on('demografis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('micro_small_and_medium_enterprises');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title', 200);
            $table->string('slug', 200);
            $table->string('short_desc', 200)->nullable();
            $table->text('description');
            $table->string('image', 200);
            $table->string('thumbnail', 200);
            $table->bigInteger('user_id');
            $table->boolean('status')->default(true);
            $table->boolean('is_higlight_post')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}

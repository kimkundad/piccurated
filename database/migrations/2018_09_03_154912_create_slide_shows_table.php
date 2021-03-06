<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideShowsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text_slide1')->nullable();
            $table->string('text_slide2')->nullable();
            $table->string('text_slide3')->nullable();
            $table->string('btn_slide')->nullable();
            $table->string('btn_url')->nullable();
            $table->string('image_slide')->nullable();
            $table->integer('slide_status')->default('0');
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
        Schema::dropIfExists('slide_shows');
    }
}

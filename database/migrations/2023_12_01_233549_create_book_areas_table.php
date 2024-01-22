<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_areas', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('short_title')->nullable();
            $table->string('main_title')->nullable();
            $table->text('short_description')->nullable();
            $table->string('link_url')->nullable();
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
        Schema::dropIfExists('book_areas');
    }
};
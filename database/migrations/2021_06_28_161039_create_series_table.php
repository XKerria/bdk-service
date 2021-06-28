<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->string('id', 19)->primary();
            $table->string('name');
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('brand_id', 19);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}

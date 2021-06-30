<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('id', 19)->primary();
            $table->unsignedInteger('amount');
            $table->unsignedInteger('remain');
            $table->string('series_id', 19);
            $table->string('firm_id', 19);
            $table->timestamps();

            $table->foreign('series_id')->references('id')->on('series')->cascadeOnDelete();
            $table->foreign('firm_id')->references('id')->on('firms')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

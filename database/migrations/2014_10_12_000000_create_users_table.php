<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 19)->primary();
            $table->string('name', 32);
            $table->string('phone', 32)->unique();
            $table->string('password')->nullable();
            $table->string('firm_id', 19)->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('users');
    }
}

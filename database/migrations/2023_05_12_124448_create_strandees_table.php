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
        Schema::create('strandees', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('birthday')->nullable();
            $table->string('problem_presented')->nullable();
            $table->string('intervention')->nullable();
            $table->string('image')->nullable();
            $table->string('encoder_id')->nullable();
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
        Schema::dropIfExists('strandees');
    }
};

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
        Schema::create('special_cases', function (Blueprint $table) {
            $table->id();
            $table->string('sc_no')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('special_cases');
    }
};

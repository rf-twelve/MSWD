<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('minor_traveling_abroads', function (Blueprint $table) {
            $table->id();
            $table->string('mta_no')->nullable();
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('destination')->nullable();
            $table->string('traveling_companion')->nullable();
            $table->string('address')->nullable();
            $table->string('parents')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('minor_traveling_abroads');
    }
};

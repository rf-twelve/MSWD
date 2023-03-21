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
      Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('claimant_id')->nullable();
            $table->string('beneficiary_id')->nullable();
            $table->string('relation')->nullable();
            $table->string('burial')->nullable();
            $table->string('medical')->nullable();
            $table->string('educational')->nullable();
            $table->string('fire')->nullable();
            $table->string('others')->nullable();
            $table->text('remarks')->nullable();
            $table->string('welfare_agency')->nullable();
            $table->string('contact')->nullable();
            $table->string('worker_id')->nullable();
            $table->string('is_active')->nullable();
            $table->text('encoder_id')->nullable();
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
        Schema::dropIfExists('referrals');
    }
};

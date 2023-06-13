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
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->string('aics_no')->nullable();
            $table->string('date')->nullable();
            $table->string('claimant_id')->nullable();
            $table->string('beneficiary_id')->nullable();
            $table->string('relation')->nullable();
            $table->string('burial')->nullable();
            $table->string('medical')->nullable();
            $table->string('educational')->nullable();
            $table->string('fire')->nullable();
            $table->string('transpo')->nullable();
            $table->string('house_repair')->nullable();
            $table->string('add_capital')->nullable();
            $table->string('others')->nullable();
            $table->string('amount')->nullable();
            $table->string('amount_type')->nullable();
            $table->string('worker_id')->nullable();
            $table->string('is_active')->nullable();
            $table->text('encoder_id')->nullable();
            $table->text('remarks')->nullable();
            $table->text('date_release')->nullable();
            $table->text('charges')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('assistances');
    }
};

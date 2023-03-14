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
            $table->string('date')->nullable();
            $table->string('claimant_id')->nullable();
            $table->string('beneficiary_id')->nullable();
            $table->string('relation')->nullable();
            $table->string('assistance_type')->nullable();
            ##burial medical education fire transpo house_repair add_capital
            $table->string('assistance_class')->nullable();
            ## aics or referral
            $table->string('amount')->nullable();
            $table->string('amount_type')->nullable();
            ##cash or check
            $table->string('referral')->nullable();
            $table->string('welfare_agency')->nullable();
            $table->string('worker_id')->nullable();
            $table->string('is_active')->nullable();
            $table->text('encoder_id')->nullable();
            $table->text('remarks')->nullable();
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

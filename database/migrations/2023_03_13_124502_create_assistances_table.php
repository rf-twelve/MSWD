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
            $table->string('date');
            $table->string('claimant_id');
            $table->string('beneficiary_id');
            $table->string('relation');
            $table->string('assistance_type');
            ##burial medical education fire transpo house_repair add_capital
            $table->string('amount');
            $table->string('amount_type');
            ##cash or check
            $table->string('referral');
            $table->string('welfare_agency');
            $table->string('worker_id');
            $table->string('is_active');
            $table->text('remarks');
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

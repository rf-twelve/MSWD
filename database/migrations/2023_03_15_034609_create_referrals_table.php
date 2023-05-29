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
            $table->string('client_id')->nullable();
            $table->string('beneficiary_id')->nullable();
            $table->string('relation')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('assistance')->nullable();
            $table->string('referral')->nullable();
            $table->text('remarks')->nullable();
            $table->string('welfare_agency')->nullable();
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

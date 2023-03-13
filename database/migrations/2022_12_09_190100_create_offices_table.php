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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('office_id');
            $table->string('user_sent');
            $table->string('date_sent');
            $table->string('user_received');
            $table->string('date_received');
            $table->string('status');
            $table->timestamps();
            $table->unsignedBigInteger('doc_id')->index();
            $table->foreign('doc_id')
                ->references('id')
                ->on('docs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
};

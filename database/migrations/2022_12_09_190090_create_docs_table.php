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
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->string('tn');
            $table->string('class');
            $table->string('date');
            $table->string('received_by');
            $table->string('title')->nullable();
            $table->string('origin')->nullable();
            $table->string('nature')->nullable();
            $table->string('for');
            $table->string('status')->nullable();
            $table->text('remarks')->nullable();
            $table->tinyInteger('is_draft');
            $table->unsignedInteger('office_id');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('docs');
    }
};

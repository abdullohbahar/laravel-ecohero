<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tracking_data_id');
            $table->foreign('tracking_data_id')->references('id')->on('tracking_data')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam');
            $table->text('status');
            $table->text('asal');
            $table->text('tujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timelines');
    }
};

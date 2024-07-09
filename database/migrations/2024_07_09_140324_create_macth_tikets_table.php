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
        Schema::create('macth_tikets', function (Blueprint $table) {
            $table->id();
            $table->string('imageT1')->nullable();
            $table->string('imageT2')->nullable();
            $table->string('jam');
            $table->string('jenis_macth');
            $table->string('hari');
            $table->string('tanggal_macth');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('macth_tikets');
    }
};

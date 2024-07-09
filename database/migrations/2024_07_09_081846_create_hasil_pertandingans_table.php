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
        Schema::create('hasil_pertandingans', function (Blueprint $table) {
            $table->id();
            $table->string('type_pertandingan');
            $table->string('skor');
            $table->string('img_1');
            $table->string('img_2');
            $table->string('nm_team1');
            $table->string('nm_team2');
            $table->string('stadium');
            $table->string('pencetakgol1')->nullable();
            $table->string('pencetakgol2')->nullable();
            $table->string('pencetakgol3')->nullable();
            $table->string('pencetakgol4')->nullable();
            $table->string('pencetakgol5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_pertandingans');
    }
};

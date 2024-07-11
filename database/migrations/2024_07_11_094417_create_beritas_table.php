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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('img_bg');
            $table->string('title',150);
            $table->string('type_umur',50);
            $table->string('par1',500);
            $table->string('par2',500);
            $table->string('par3',500);
            $table->string('par4',500);
            $table->string('par5',500);
            $table->string('foto_1');
            $table->string('foto_2');
            $table->string('foto_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};

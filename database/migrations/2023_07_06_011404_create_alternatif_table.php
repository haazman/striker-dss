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
        //
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('stamina');
            $table->double('posture');
            $table->double('finishing');
            $table->double('dribbling');
            $table->double('header');
            $table->double('attitude');
            $table->double('indeks_vikor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif');
    }
};

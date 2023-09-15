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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_program')->nullable();
            $table->string('nama_program')->nullable()->comment("program
            - '00' = Program Pra-SD
            - '01' = Paket A
            - '02' = Paket B
            - '03' = Paket C
            - '04' = Rumah Tahfidz");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

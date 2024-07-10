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
        Schema::create('paciente_plano_saude', function (Blueprint $table) {
            $table->id('pps_codigo');
            $table->foreignId('pac_codigo')->constrained('paciente', 'pac_codigo')->onDelete('cascade');
            $table->foreignId('plano_codigo')->constrained('plano_saude', 'plano_codigo')->onDelete('cascade');
            $table->string('pps_nrContrato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente_plano_saude');
    }
};

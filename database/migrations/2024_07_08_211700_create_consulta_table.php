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
        Schema::create('consulta', function (Blueprint $table) {
            $table->id('cons_codigo');
            $table->foreignId('pac_codigo')->constrained('paciente', 'pac_codigo')->onDelete('cascade');
            $table->foreignId('med_codigo')->constrained('medico', 'med_codigo')->onDelete('cascade');
            $table->foreignId('pps_codigo')->nullable()->constrained('paciente_plano_saude', 'pps_codigo')->onDelete('cascade');
            $table->date('cons_data');
            $table->time('cons_hora');
            $table->boolean('cons_particular')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta');
    }
};

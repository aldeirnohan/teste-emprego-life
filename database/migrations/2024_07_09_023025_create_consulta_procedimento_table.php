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
        Schema::create('consulta_procedimento', function (Blueprint $table) {
            $table->id('cp_codigo');
            $table->foreignId('cons_codigo')->constrained('consulta', 'cons_codigo')->onDelete('cascade');
            $table->foreignId('proc_codigo')->constrained('procedimento', 'proc_codigo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_procedimento');
    }
};

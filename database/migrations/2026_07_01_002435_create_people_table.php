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
        Schema::create('people', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();

            $table->string('cliente_unico')->nullable()->index();
            $table->string('nombre_cte')->nullable()->index();
            $table->string('genero_cliente')->nullable();
            $table->integer('edad_cliente')->nullable();
            $table->string('ocupacion')->nullable();

            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();

            $table->string('producto')->nullable();
            $table->integer('dias_atraso')->nullable()->index();

            $table->decimal('saldo', 14, 2)->nullable();
            $table->decimal('saldo_total', 14, 2)->nullable();
            $table->decimal('saldo_atrasado', 14, 2)->nullable();
            $table->decimal('saldo_requerido', 14, 2)->nullable();

            $table->string('nombre_despacho')->nullable();
            $table->string('gestores')->nullable();

            $table->string('ultima_gestion')->nullable();
            $table->string('gestion_desc')->nullable();

            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();

            $table->json('raw_data')->nullable();

            $table->timestamps();

            $table->unique(['company_id', 'cliente_unico']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};

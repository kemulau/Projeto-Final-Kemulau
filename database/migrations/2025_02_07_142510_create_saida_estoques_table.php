<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('saida_estoques', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade')->unsigned();
            $table->foreignId('id_cliente')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('id_produto')->constrained('produtos')->onDelete('cascade');
            $table->decimal('valor_total', 10, 2);
            $table->timestamp('data_saida_estoque')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });

        // Criando um índice para otimizar as consultas
        Schema::table('saida_estoques', function (Blueprint $table) {
            $table->index('id_produto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saida_estoques');
    }
};

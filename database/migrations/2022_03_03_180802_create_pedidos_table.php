<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('NumeroPedido')->autoIncrement();
            $table->dateTime('DtPedido', $precision = 0);
            $table->enum('Status',['Em Aberto','Pago','Cancelado']);
            
            $table->foreignId('ClienteId')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('ProdutoId')->constrained('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};

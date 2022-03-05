<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // try {
            DB::beginTransaction();
            $clientes = Cliente::factory()->count(3)->make()->toArray();
            $produtos = Produto::factory()->count(3)->make()->toArray();

            foreach ($clientes as $cliente) {
                $cliente = Cliente::create($cliente);
                $pedido = Pedido::factory()->make()->toArray();
                $cliente->pedido()->create($pedido);
            }

            foreach ($produtos as $produto) {
                $produto = Produto::create($produto);
                $pedido = Pedido::factory()->make()->toArray();
                $produto->pedido()->create($pedido);
            }

            DB::commit();
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'CodBarras'=>$this->faker->unique()->randomNumber(),
            'NomeProduto'=>$this->faker->word,
            'ValorUnitario'=>$this->faker->randomDigit,
            'Quantidade'=>$this->faker->numberBetween(50,200)
        ];
    }
}

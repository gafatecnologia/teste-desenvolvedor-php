<?php

namespace Database\Factories;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use LaravelLegends\PtBrValidator\Rules\Cpf;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'NomeCliente'=>$this->faker->name(),
            'EMAIL'=>$this->faker->unique()->safeEmail(),
            'CPF'=>rand(10000000000,99999999999)
        ];
    }
}

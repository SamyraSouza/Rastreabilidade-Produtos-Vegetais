<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
            return [
                'nome' => fake()->name(),
                'email' => fake()->email(),
                'cpf' => fake()->name(),
                'cnpj' => fake()->name(),
                'tipo_endereco' => fake()->name(),
                'endereco' => fake()->name(),
                'tipo_pessoa' => fake()->name(),
                'tipo_perfil' => fake()->name(),
                'permission' => fake()->numberBetween(0, 1),
                'senha' => fake()->name()
            ];
      
    }
}

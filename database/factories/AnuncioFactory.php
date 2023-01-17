<?php

namespace Database\Factories;

use App\Models\Anuncio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anuncio>
 */
class AnuncioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Anuncio::class;
    public function definition()
    {
        
        return [
            'titulo' => fake()->titulo(),
            'preco' => Str::random([5,100]),
            'descricao' => fake()->descricao(),
            'estado'=> $this->faker->randomElement(['usado','novo']),
           
        ];
    }
}

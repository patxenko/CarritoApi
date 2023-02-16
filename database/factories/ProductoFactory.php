<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        
        return [
            'nombre' => $this->faker->word(),                 // una palabra inventada como nombre
            'descripcion' => $this->faker->text(200),        // texto random que hara las veces de descripcion
            'precio' => $this->faker->numberBetween(15,200)  // un precio entre 15 y 200
        ];
    }
}

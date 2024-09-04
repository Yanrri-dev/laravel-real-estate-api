<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prpopiedad;
use Illuminate\Support\Str;


class PropiedadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'direccion' => $this->faker->address(),
            'ciudad' => $this->faker->city(),
            'precio' => $this->faker->randomFloat(2, 100000, 1000000),
            'descripcion' => $this->faker->text(200),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
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
        $name = $this->faker->sentence(2);
        $stock = $this->faker->randomDigitNotNull();
        $categoria = Categoria::all()->random();
        $price = $this->faker->randomDigitNotNull();

        return [
            'name' => $name,
            'description' => $this->faker->sentence(5),
            'stock' => $stock,
            'price' => $price,
            'status' => Producto::Activo,
            'categoria_id' => $categoria,
        ];
    }
}

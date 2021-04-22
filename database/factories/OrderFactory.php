<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'status' => $this->faker->randomElement(['Activo', 'Inactivo', 'Recibido']),
            'appointment_id'   => $this->faker->unique()->numberBetween(1, 50),
            'supplier_id'   => $this->faker->numberBetween(1, 5)
        ];
    }
}

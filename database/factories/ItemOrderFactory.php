<?php

namespace Database\Factories;

use App\Models\ItemOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'order_id'  => $this->faker->numberBetween(1,50),
            'item_id'   => $this->faker->numberBetween(1, 50)
        ];
    }
}

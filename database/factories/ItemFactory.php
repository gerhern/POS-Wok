<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name'        => $this->faker->sentence(),
            'description' => $this->faker->text(150),
            'price'       => $this->faker->randomFloat(2,0,5999),
            'department'  => $this->faker->randomElement(['Bath','Kitchen', 'Bed', 'Cleaning', 'Towels']),
            'quantity'    => $this->faker->randomDigit
        ];
    }
}

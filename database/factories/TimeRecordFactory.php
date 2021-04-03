<?php

namespace Database\Factories;

use App\Models\TimeRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimeRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'   => $this->faker->numberBetween(1,30),
            'checkin'  => $this->faker->date(),
            'checkout' => $this->faker->date(),
        ];
    }
}

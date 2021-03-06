<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'appointment_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'supplier_id' => $this->faker->numberBetween(1,5)
        ];
    }
}

<?php

namespace Database\Factories;
use app\Models\ContactForm;
use Illuminate\Database\Eloquent\Factories\Factory;

class COntactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'url'=>$this->faker->url,
            'gender'=>$this->fakar->rondomElement(['0','1']),
            'age'=>$this->faker->numberBetween($min=1,$max=6),
            'contact'=>$this->faker->realText(200),
        ];
    }
}

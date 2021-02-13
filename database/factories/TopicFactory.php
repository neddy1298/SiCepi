<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Because','Getting','Motivation','Them','Want','You','Always','Battle','Found','Indispensable','Planning','Plans','Preparing','Useless','Defeat','Glory','May','Out','Serve','Shake','Soul','Victory','Well','Incapacity','Love','Only','To Love','Art','Fine','FineArt','Go','Hand','Head','Heart','Man','Together','Which','Enemy','Friend','Nature','Need','People','Sure','Then','Think']),
            'popular' => $this->faker->randomElement([0,1]),
        ];
    }
}

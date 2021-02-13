<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Jim Rohn','Dwight D .Eisenhower','Edwin Markham','Anais Nin','John Ruskin','Kurt Vonnegut']),
            'popular' => $this->faker->randomElement([0,1]),
        ];
    }
}

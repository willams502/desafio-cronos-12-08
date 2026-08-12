<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'publication_year' => $this->faker->numberBetween(1900, date('Y')),
            'category' => $this->faker->randomElement(['Ficção','Não-ficção','Ciência','História','Tecnologia','Arte','Infantil','Poesia']),
            'borrowed_by' => $this->faker->boolean(25) ? $this->faker->name() : null,
            'expected_return_date' => $this->faker->boolean(25) ? $this->faker->date() : null,
        ];
    }
}

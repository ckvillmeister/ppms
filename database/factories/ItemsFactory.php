<?php

namespace Database\Factories;
use Faker\Generator as Faker;

use App\Models\Items;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Items::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'itemname' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigit(),
            'uom' => 1,
            'object_of_expenditure' => 1,
            'category' => 1,
            'createdby' => 1,
            'datecreated' => date('Y-m-d H:i:s'),
            'status' => 1
        ];
    }
}

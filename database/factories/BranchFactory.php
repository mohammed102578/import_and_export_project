<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vendor_id' => $this->faker->word,
        'name_ar' => $this->faker->word,
        'name_en' => $this->faker->word,
        'latitude' => $this->faker->word,
        'longitude' => $this->faker->word,
        'opening_time' => $this->faker->word,
        'closing_time' => $this->faker->word,
        'status' => $this->faker->word,
        'availale' => $this->faker->word,
        'dnn_table' => $this->faker->word,
        'mobile_code' => $this->faker->word,
        'mobile' => $this->faker->word,
        'phone' => $this->faker->word,
        'rates' => $this->faker->word,
        'num_of_items' => $this->faker->word,
        'num_of_orders' => $this->faker->word,
        'total_earnings' => $this->faker->word
        ];
    }
}

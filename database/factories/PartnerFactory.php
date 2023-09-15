<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'nameArabic' => $this->faker->word,
        'image' => $this->faker->word,
        'website' => $this->faker->word,
        'active' => $this->faker->randomDigitNotNull,
        'timestamp' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_ar' => $this->faker->word,
        'name_en' => $this->faker->word,
        'category_id' => $this->faker->randomDigitNotNull,
        'email' => $this->faker->word,
        'mobile_code' => $this->faker->word,
        'mobile' => $this->faker->word,
        'phone' => $this->faker->word,
        'facebook_url' => $this->faker->word,
        'latitude' => $this->faker->word,
        'longitude' => $this->faker->word,
        'has_ban' => $this->faker->randomDigitNotNull,
        'ban_reason' => $this->faker->text,
        'image' => $this->faker->word,
        'cover' => $this->faker->word,
        'wallet' => $this->faker->word,
        'rates' => $this->faker->randomDigitNotNull,
        'num_of_items' => $this->faker->randomDigitNotNull,
        'num_of_orders' => $this->faker->randomDigitNotNull,
        'total_earnings' => $this->faker->word,
        'available' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->randomDigitNotNull,
        'display_in_slider' => $this->faker->randomDigitNotNull,
        'created_by' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

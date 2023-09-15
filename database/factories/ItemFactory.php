<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vendor_id' => $this->faker->randomDigitNotNull,
        'branch_id' => $this->faker->randomDigitNotNull,
        'name_ar' => $this->faker->word,
        'name_en' => $this->faker->word,
        'image' => $this->faker->word,
        'description_ar' => $this->faker->text,
        'description_en' => $this->faker->text,
        'category_id' => $this->faker->randomDigitNotNull,
        'deliver_services' => $this->faker->randomDigitNotNull,
        'unit_type' => $this->faker->word,
        'price' => $this->faker->word,
        'has_options' => $this->faker->randomDigitNotNull,
        'parent_id' => $this->faker->randomDigitNotNull,
        'selling_counter' => $this->faker->randomDigitNotNull,
        'discount' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

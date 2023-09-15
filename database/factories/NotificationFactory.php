<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->word,
        'user_id' => $this->faker->randomDigitNotNull,
        'type' => $this->faker->word,
        'value_ar' => $this->faker->word,
        'value_en' => $this->faker->word,
        'title_ar' => $this->faker->word,
        'title_en' => $this->faker->word,
        'icon' => $this->faker->word,
        'is_seen' => $this->faker->randomDigitNotNull,
        'order_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

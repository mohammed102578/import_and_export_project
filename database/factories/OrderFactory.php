<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'vendor_id' => $this->faker->randomDigitNotNull,
        'branch_id' => $this->faker->randomDigitNotNull,
        'duration' => $this->faker->word,
        'promocode_id' => $this->faker->word,
        'promocode_discount' => $this->faker->word,
        'payment_type' => $this->faker->word,
        'status' => $this->faker->word,
        'discount' => $this->faker->word,
        'delivery_fees' => $this->faker->word,
        'time_to_arrive' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\PublicQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PublicQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_ar' => $this->faker->word,
        'question_en' => $this->faker->word,
        'answer_ar' => $this->faker->text,
        'answer_en' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

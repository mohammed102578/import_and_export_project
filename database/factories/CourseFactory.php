<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Course_ID' => $this->faker->word,
        'Title' => $this->faker->word,
        'TitleArabic' => $this->faker->word,
        'Description' => $this->faker->word,
        'DescriptionArabic' => $this->faker->word,
        'LearningObjectives' => $this->faker->text,
        'LearningObjectivesArabic' => $this->faker->word,
        'SkillsGained' => $this->faker->word,
        'SkillsGainedArabic' => $this->faker->word,
        'Category' => $this->faker->randomDigitNotNull,
        'Language' => $this->faker->word,
        'Level' => $this->faker->word,
        'StartTime' => $this->faker->word,
        'EndTime' => $this->faker->word,
        'Color' => $this->faker->word,
        'IsActive' => $this->faker->word,
        'InstructorEmail' => $this->faker->word,
        'Partner' => $this->faker->randomDigitNotNull,
        'image' => $this->faker->word,
        'PassCode' => $this->faker->word,
        'MeetingURL' => $this->faker->word,
        'VideoId' => $this->faker->word,
        'Type' => $this->faker->word,
        'Location' => $this->faker->word,
        'Duration' => $this->faker->word,
        'Material' => $this->faker->word,
        'CourseProviderImage' => $this->faker->word,
        'Tags' => $this->faker->word,
        'TimeStamp' => $this->faker->date('Y-m-d H:i:s'),
        'updatedAt' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

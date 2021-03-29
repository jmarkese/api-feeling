<?php

namespace Database\Factories;

use App\Models\Feeling;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FeelingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feeling::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 month', 'now');
        $chars = $this->faker->numberBetween(50, 200);
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->realText($chars, $indexSize = 2),
            'user_id' => $this->faker->numberBetween(1, 10),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}

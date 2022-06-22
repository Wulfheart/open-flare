<?php

namespace Database\Factories;

use App\Models\Exception;
use App\Models\Log;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Log::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exception_id' => Exception::factory(),
            'message' => $this->faker->word,
            'level' => $this->faker->word,
            'context' => '{}',
            'microtime' => $this->faker->word,
        ];
    }
}

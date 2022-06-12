<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Exception;
use App\Models\Stacktrace;

class StacktraceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stacktrace::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exception_id' => Exception::factory(),
            'ordinal_number' => $this->faker->word,
            'file' => $this->faker->word,
            'line_number' => $this->faker->word,
            'method' => $this->faker->word,
            'class' => $this->faker->word,
            'code_snippet' => '{}',
            'application_frame' => $this->faker->word,
        ];
    }
}

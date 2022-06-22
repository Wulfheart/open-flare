<?php

namespace Database\Factories;

use App\Models\Exception;
use App\Models\Query;
use Illuminate\Database\Eloquent\Factories\Factory;

class QueryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Query::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exception_id' => Exception::factory(),
            'sql' => $this->faker->word,
            'time' => $this->faker->word,
            'connection_name' => $this->faker->word,
            'bindings' => '{}',
            'microtime' => $this->faker->word,
        ];
    }
}

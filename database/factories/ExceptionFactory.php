<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Exception;
use App\Models\Project;

class ExceptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exception::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::factory(),
            'tracking_uuid' => $this->faker->uuid,
            'notifier' => $this->faker->word,
            'language' => $this->faker->word,
            'framework_version' => $this->faker->word,
            'language_version' => $this->faker->word,
            'exception_class' => $this->faker->word,
            'seen_at' => $this->faker->dateTime(),
            'message' => $this->faker->word,
            'stage' => $this->faker->word,
            'message_level' => $this->faker->word,
            'application_version' => $this->faker->word,
            'git_hash' => $this->faker->word,
            'git_message' => $this->faker->word,
            'git_tag' => $this->faker->word,
            'git_remote' => $this->faker->word,
            'git_isDirty' => $this->faker->boolean,
            'session' => '{}',
            'cookies' => '{}',
            'route' => '{}',
            'env' => '{}',
            'request' => '{}',
            'request_data_query_string' => '{}',
            'request_data_body' => '{}',
            'request_data_files' => '{}',
            'headers' => '{}',
            'user_id' => $this->faker->word,
            'user' => '{}',
            'similarity_hash' => $this->faker->word,
        ];
    }
}

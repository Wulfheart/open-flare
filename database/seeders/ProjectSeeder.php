<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Test',
            'password' => bcrypt('password'),
            'email' => 'test@test.de',
        ]);

        Project::create([
            'name' => 'TestProjekt',
            'user_id' => $user->id,
            'key' => 'test',
        ]);
    }
}

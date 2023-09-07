<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $project = new Project();
            $project->title = $faker->text(20);
            $project->content = $faker->paragraph(15, true);
            $project->slug = Str::slug($project->title, '-');
            $project->image = $faker->imageUrl(250, 250);
            $project->save();
        }
    }
}

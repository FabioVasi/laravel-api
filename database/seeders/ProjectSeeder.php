<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) { 
            $project = new Project();
            $project->title = $faker->realText(50);
            $project->image = 'https://picsum.photos/200/300';
            $project->github = $faker->url();
            $project->second_link = $faker->url();
            $project->slug = Str::slug($project->title, '-');
            $project->content = $faker->realText(50);
            $project->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['html', 'css', 'bootstrap', 'js', 'debugging', 'vite', 'php', 'db', 'mysql', 'laravel'];

        foreach ($technologies as $technology) {
            if(Technology::where('name','=',$technology)->exists()) {
                $new_technology = new Technology();
                $new_technology->name = $technology;
                $new_technology->slug = Str::slug($new_technology->name, '-');
                $new_technology->save();
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//faker 
use Faker\Generator as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 20; $i++) {
            //project random per assegnazione a commento
            $project = Project::inRandomOrder()->first();
            //creazione istanze del ciclo
            $new_comment = new Comment();
            $new_comment->author = $faker->name(2);
            $new_comment->content = $faker->text(500);
            $new_comment->project_id = $project->id;
            $new_comment->save();
        }
       
    }
}

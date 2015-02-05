<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('projects')->delete();

        $projects = array(
            ['id' => 1, 'name' => 'Project 1', 'slug' => 'project-1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Project 2', 'slug' => 'project-2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Project 3', 'slug' => 'project-3', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('projects')->insert($projects);
    }

}
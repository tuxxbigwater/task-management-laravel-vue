<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $tasks = [
        ['title' => 'Set up Laravel project environment'],
        ['title' => 'Create user authentication system'],
        ['title' => 'Build database migration for tasks'],
        ['title' => 'Develop task creation API endpoint'],
        ['title' => 'Implement task update functionality'],
        ['title' => 'Add task deletion feature'],
      ];

      foreach ($tasks as $task) {
        DB::table('tasks')->insert([
            'title' => $task['title'],
            'completed' => rand() % 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    }
}

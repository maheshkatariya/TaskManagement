<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Task::factory(10)->create();

        // \App\Models\Task::factory()->create([
        //     'task' => 'My first task',
        //     'status' => 'pending',
        // ]);
    }
}

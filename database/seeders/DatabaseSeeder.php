<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        $classes = SchoolClass::factory(5)->create();

        // For each class create 10 students
        $classes->each(function ($class) {
            $students = \App\Models\Student::factory(10)->create([
                'class_id' => $class->id,
            ]);

            // For each student, add 5 attendance records
            $students->each(function ($student) use ($class) {
                \App\Models\Attendance::factory(5)->create([
                    'student_id' => $student->id,
                    'class_id' => $class->id,
                ]);
            });
        });
    }
}
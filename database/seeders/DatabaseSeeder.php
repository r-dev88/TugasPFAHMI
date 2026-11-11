<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        // 1. Buat data 12 kelas dan masing-masing 10 siswa nyata
        $this->call([
            ClassroomSeeder::class,
            StudentSeeder::class,
        ]);

        // 2. Seeding untuk Subject & Teacher (1 Mapel diajar oleh 1 Guru)
        $subjects = Subject::factory(10)->create();
        foreach ($subjects as $subject) {
            Teacher::factory()->create([
                'subject_id' => $subject->id,
            ]);
        }
    }
}

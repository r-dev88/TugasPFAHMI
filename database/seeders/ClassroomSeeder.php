<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = [
            ['name' => '10 PPLG 1', 'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => '10 PPLG 2', 'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => '11 PPLG 1', 'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => '11 PPLG 2', 'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => '11 PPLG 3', 'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => '12 PPLG 1', 'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => '12 PPLG 2', 'major' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['name' => '10 TKJ 1', 'major' => 'Teknik Komputer dan Jaringan'],
            ['name' => '11 TKJ 1', 'major' => 'Teknik Komputer dan Jaringan'],
            ['name' => '12 TKJ 1', 'major' => 'Teknik Komputer dan Jaringan'],
            ['name' => '10 DKV 1', 'major' => 'Desain Komunikasi Visual'],
            ['name' => '11 DKV 1', 'major' => 'Desain Komunikasi Visual'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::firstOrCreate(
                ['name' => $classroom['name']],
                ['major' => $classroom['major']]
            );
        }
    }
}

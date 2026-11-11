<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $majors = [
            'PPLG' => 'Pengembangan Perangkat Lunak dan Gim',
            'TKJ' => 'Teknik Komputer dan Jaringan',
            'DKV' => 'Desain Komunikasi Visual',
            'AKL' => 'Akuntansi dan Keuangan Lembaga',
            'MPLB' => 'Manajemen Perkantoran dan Layanan Bisnis',
        ];

        $code = fake()->randomElement(array_keys($majors));
        $grade = fake()->randomElement(['10', '11', '12']);
        $number = fake()->numberBetween(1, 4);

        return [
            'name' => "{$grade} {$code} {$number}",
            'major' => $majors[$code],
        ];
    }
}

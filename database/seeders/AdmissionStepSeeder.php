<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\AdmissionStep;
use Illuminate\Database\Seeder;

class AdmissionStepSeeder extends Seeder
{
    public function run(): void
    {
        $steps = [
            ['step_number' => 1, 'title' => 'Hujjatlar topshirish', 'description' => 'Qabul komissiyasiga zarur hujjatlar ro\'yxatini topshirish.'],
            ['step_number' => 2, 'title' => "Tibbiy ko'rik", 'description' => "Harbiy-vrachlik komissiyasidan o'tish."],
            ['step_number' => 3, 'title' => 'Jismoniy tayyorgarlik', 'description' => 'Belgilangan normativlar bo\'yicha sinovlar.'],
            ['step_number' => 4, 'title' => 'Bilim sinovi', 'description' => 'Matematika, fizika va informatika fanlaridan test sinovi.'],
            ['step_number' => 5, 'title' => "Buyruq e'lon qilinishi", 'description' => "Qabul natijalari va kursantlar ro'yxati e'lon qilinadi."],
        ];

        foreach ($steps as $order => $step) {
            AdmissionStep::query()->updateOrCreate(
                ['step_number' => $step['step_number']],
                [
                    'title' => ['uz' => $step['title']],
                    'description' => ['uz' => $step['description']],
                    'order' => $order,
                    'is_active' => true,
                ],
            );
        }
    }
}

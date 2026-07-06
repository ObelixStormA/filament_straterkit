<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\AdmissionKeyDate;
use Illuminate\Database\Seeder;

class AdmissionKeyDateSeeder extends Seeder
{
    public function run(): void
    {
        $dates = [
            [
                'title' => 'Hujjatlar qabul qilish muddati',
                'date_start' => now()->addDays(10)->toDateString(),
                'date_end' => now()->addDays(40)->toDateString(),
            ],
            [
                'title' => 'Kirish imtihonlari jadvali',
                'date_start' => now()->addDays(45)->toDateString(),
                'date_end' => null,
            ],
            [
                'title' => "Qabul natijalari e'lon qilinishi",
                'date_start' => now()->addDays(60)->toDateString(),
                'date_end' => null,
            ],
        ];

        foreach ($dates as $order => $date) {
            AdmissionKeyDate::query()->updateOrCreate(
                ['order' => $order],
                [
                    'title' => ['uz' => $date['title']],
                    'date_start' => $date['date_start'],
                    'date_end' => $date['date_end'],
                    'is_active' => true,
                ],
            );
        }
    }
}

<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    public function run(): void
    {
        $journals = [
            ['year' => 2026, 'issue_number' => '1-son', 'title' => 'AKTVA Ilmiy-texnikaviy jurnali', 'description' => "Axborot xavfsizligi, kibermudofaa va harbiy aloqa tizimlari bo'yicha ilmiy maqolalar to'plami.", 'code_value' => '2181-XXXX'],
            ['year' => 2025, 'issue_number' => '4-son', 'title' => 'AKTVA Ilmiy-texnikaviy jurnali', 'description' => 'Raqamli kriptografiya va tarmoq xavfsizligi mavzusidagi maqolalar.', 'code_value' => '2181-XXXX'],
            ['year' => 2025, 'issue_number' => '3-son', 'title' => 'AKTVA Ilmiy-texnikaviy jurnali', 'description' => 'Harbiy aloqa tarmoqlarida signal xavfsizligi bo\'yicha tadqiqotlar.', 'code_value' => '2181-XXXX'],
            ['year' => 2025, 'issue_number' => '2-son', 'title' => 'AKTVA Ilmiy-texnikaviy jurnali', 'description' => 'OSINT usullari va signal monitoringi bo\'yicha ilmiy maqolalar.', 'code_value' => '2181-XXXX'],
            ['year' => 2025, 'issue_number' => '1-son', 'title' => 'AKTVA Ilmiy-texnikaviy jurnali', 'description' => 'Tarmoq infratuzilmasi va VPN yechimlari bo\'yicha maqolalar to\'plami.', 'code_value' => '2181-XXXX'],
            ['year' => 2024, 'issue_number' => '4-son', 'title' => 'AKTVA Ilmiy-texnikaviy jurnali', 'description' => 'Sun\'iy yo\'ldosh aloqasi va raqamli razvedka mavzusidagi tadqiqotlar.', 'code_value' => '2181-XXXX'],
        ];

        foreach ($journals as $order => $journal) {
            Publication::query()->updateOrCreate(
                ['type' => 'journal', 'year' => $journal['year'], 'issue_number' => $journal['issue_number']],
                [
                    'code_type' => 'ISSN',
                    'code_value' => $journal['code_value'],
                    'title' => ['uz' => $journal['title']],
                    'description' => ['uz' => $journal['description']],
                    'order' => $order,
                    'is_published' => true,
                ],
            );
        }

        $collections = [
            ['year' => 2026, 'event_type' => 'Xalqaro konferensiya', 'title' => 'Harbiy aloqa va kibermudofaa: zamonaviy yondashuvlar', 'description' => "Xalqaro ilmiy-amaliy konferensiya materiallari to'plami.", 'code_value' => '978-9943-XXXX'],
            ['year' => 2025, 'event_type' => 'Respublika anjumani', 'title' => 'Yosh olimlar ilmiy anjumani materiallari', 'description' => "Kursant va yosh tadqiqotchilarning ilmiy ishlari to'plami.", 'code_value' => '978-9943-XXXX'],
            ['year' => 2025, 'event_type' => 'Respublika konferensiyasi', 'title' => 'Raqamli xavfsizlik muammolari', 'description' => "Respublika ilmiy-texnik konferensiyasi materiallari to'plami.", 'code_value' => '978-9943-XXXX'],
            ['year' => 2024, 'event_type' => 'Ilmiy-amaliy seminar', 'title' => "Harbiy ta'limda raqamli texnologiyalar", 'description' => "Institutlararo ilmiy-amaliy seminar materiallari to'plami.", 'code_value' => '978-9943-XXXX'],
            ['year' => 2024, 'event_type' => 'Xalqaro anjuman', 'title' => 'Kiberxavfsizlik: nazariya va amaliyot', 'description' => "Xalqaro ilmiy anjuman ma'ruzalari va maqolalari to'plami.", 'code_value' => '978-9943-XXXX'],
            ['year' => 2023, 'event_type' => 'Respublika anjumani', 'title' => 'Harbiy aloqa tizimlarini modernizatsiya qilish', 'description' => "Respublika ilmiy-amaliy anjumani materiallari to'plami.", 'code_value' => '978-9943-XXXX'],
        ];

        foreach ($collections as $order => $collection) {
            Publication::query()->updateOrCreate(
                ['type' => 'collection', 'year' => $collection['year'], 'event_type' => $collection['event_type']],
                [
                    'code_type' => 'ISBN',
                    'code_value' => $collection['code_value'],
                    'title' => ['uz' => $collection['title']],
                    'description' => ['uz' => $collection['description']],
                    'order' => $order,
                    'is_published' => true,
                ],
            );
        }
    }
}

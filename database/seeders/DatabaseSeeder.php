<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            HeroSlideSeeder::class,
            HeroStatSeeder::class,
            AboutSectionSeeder::class,
            AboutValueSeeder::class,
            ProgramSeeder::class,
            ContentBlockSeeder::class,
            LabSeeder::class,
            StatNumberSeeder::class,
            AdmissionStepSeeder::class,
            AdmissionKeyDateSeeder::class,
            TestimonialSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            PublicationSeeder::class,
            PartnerSeeder::class,
            SocialLinkSeeder::class,
            PageSeeder::class,
            MenuSeeder::class,
        ]);
    }
}

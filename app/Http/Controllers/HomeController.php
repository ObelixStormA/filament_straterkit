<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\AboutValue;
use App\Models\AdmissionKeyDate;
use App\Models\AdmissionStep;
use App\Models\ContentBlock;
use App\Models\HeroSlide;
use App\Models\HeroStat;
use App\Models\Lab;
use App\Models\News;
use App\Models\Partner;
use App\Models\Program;
use App\Models\StatNumber;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'heroSlide' => HeroSlide::active()->first(),
            'heroStats' => HeroStat::active()->get(),
            'aboutSection' => AboutSection::current(),
            'aboutValues' => AboutValue::active()->get(),
            'programs' => Program::active()->get(),
            'labs' => Lab::active()->get(),
            'statNumbers' => StatNumber::active()->get(),
            'admissionSteps' => AdmissionStep::active()->get(),
            'testimonials' => Testimonial::active()->get(),
            'news' => News::published()->where('is_research', false)->latest('published_at')->take(3)->get(),
            'research' => News::published()->research()->latest('published_at')->take(3)->get(),
            'announcements' => AdmissionKeyDate::active()->get(),
            'partners' => Partner::active()->get(),
            'mottoBlock' => ContentBlock::byKey('motto_banner'),
            'programsIntro' => ContentBlock::byKey('section_yonalishlar_intro'),
            'researchLabsIntro' => ContentBlock::byKey('section_ilmiy_faoliyat_intro'),
            'admissionsIntro' => ContentBlock::byKey('section_qabul_intro'),
            'testimonialsIntro' => ContentBlock::byKey('section_kursantlarga_intro'),
            'newsIntro' => ContentBlock::byKey('section_news_intro'),
            'researchIntro' => ContentBlock::byKey('section_research_intro'),
            'scholarshipCallout' => ContentBlock::byKey('scholarship_callout'),
            'announcementsBox' => ContentBlock::byKey('announcements_box'),
        ]);
    }
}

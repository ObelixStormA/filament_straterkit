@extends('layouts.app')

@section('title', $settings->site_name ?? 'AKTVA Instituti')

@section('content')

    {{-- Hero --}}
    <section id="home" class="video-section js-height-full">
        <div class="overlay"></div>
        <div class="home-text-wrapper relative container">
            <div class="home-message">
                <p>{{ $heroSlide?->title ?? __('Vatanparvar Kadrlar — Raqamli Mudofaa Poydevori') }}</p>
                <small>{{ $heroSlide?->subtitle ?? __("Axborot kommunikatsiya texnologiyalari va harbiy aloqa sohasida oliy bilim beruvchi harbiy ta'lim muassasasi") }}</small>
                <div class="btn-wrapper">
                    <div class="text-center">
                        <a href="{{ $heroSlide?->primary_button_url ?? '#qabul' }}" class="btn btn-primary wow slideInLeft">{{ $heroSlide?->primary_button_text ?? __('Qabul hujjatlari') }}</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="{{ $heroSlide?->secondary_button_url ?? '#about' }}" class="btn btn-default wow slideInRight">{{ $heroSlide?->secondary_button_text ?? __("Institut haqida ko'proq") }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-bottom">
            <span>{{ __('Batafsil') }} <i class="fa fa-angle-down"></i></span>
        </div>
    </section>

    <section class="section db hero-stats-strip">
        <div class="container">
            <div class="hero-stats">
                @foreach ($heroStats as $stat)
                    <div class="hero-stat-item">
                        <span class="hero-stat-number"><i class="fa {{ $stat->icon }}"></i> {{ $stat->number_display }}</span>
                        <span class="hero-stat-label">{{ $stat->label }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="custom-module">
                        <h2>{!! $aboutSection->title_html !!}</h2>

                        <p>{{ $aboutSection->description }}</p>

                        <hr class="invis">

                        <div class="row">
                            @foreach ($aboutValues as $value)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="value-box">
                                        <i class="fa {{ $value->icon }}"></i>
                                        <h5>{{ $value->title }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr class="invis">

                        <div class="btn-wrapper">
                            <a href="{{ route('home') }}#yonalishlar" class="btn btn-primary">{{ $aboutSection->button_text ?? __("Ta'lim yo'nalishlari bilan tanishish") }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="custom-module">
                        @if ($aboutSection->image)
                            <img src="{{ Storage::url($aboutSection->image) }}" alt="Institut bosh binosi" class="img-responsive img-rounded">
                        @else
                            <div class="img-placeholder about-placeholder" role="img" aria-label="Institut bosh binosi">BINO RASMI</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Ta'lim yo'nalishlari --}}
    <section id="yonalishlar" class="section gb">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{ __("Ta'lim yo'nalishlari") }}</h3>
                <p>{{ $programsIntro?->subtitle }}</p>
            </div>

            <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
                @foreach ($programs as $program)
                    <div class="caro-item">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                @if ($program->image)
                                    <img src="{{ Storage::url($program->image) }}" alt="{{ $program->name }}" class="img-responsive">
                                @else
                                    <div class="img-placeholder" role="img" aria-label="{{ $program->name }}"><i class="fa {{ $program->icon }}" style="font-size:36px;"></i></div>
                                @endif
                            </div>
                            <div class="course-details">
                                <h4>
                                    <small>{{ __("Yo'nalish") }}</small>
                                    <a href="#" title="">{{ $program->name }}</a>
                                </h4>
                                <p>{{ $program->short_description }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="invis">

            <div class="section-button text-center">
                <a href="#" class="btn btn-primary">{{ __('Barcha yo\'nalishlar') }}</a>
            </div>
        </div>
    </section>

    {{-- Motto banner --}}
    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message text-center">
                        <h3>{{ $mottoBlock?->title ?? __("Intizom bilan bilim, vatanparvarlik bilan xizmat — AKTVA Instituti kelajak zobitlarini tayyorlaydi!") }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Ilmiy faoliyat / Laboratoriyalar --}}
    <section id="ilmiy-faoliyat" class="section gb nopadtop">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{ __('Ilmiy faoliyat — Laboratoriyalar') }}</h3>
                <p>{{ $researchLabsIntro?->subtitle }}</p>
            </div>

            <div class="row">
                @foreach ($labs as $lab)
                    <div class="{{ $lab->box_size === 'wide' ? 'col-md-6' : 'col-md-3' }}">
                        <div class="box {{ $loop->last ? '' : 'm30' }}">
                            <i class="fa {{ $lab->icon }}"></i>
                            <h4>{{ $lab->title }}</h4>
                            <p>{{ $lab->description }}</p>
                            <a href="#" class="readmore">{{ __('Batafsil') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Raqamlarimiz --}}
    <section class="section db">
        <div class="container">
            <div class="row">
                @foreach ($statNumbers as $stat)
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-count">
                            <h4 class="stat-timer">{{ $stat->number_value }}</h4>
                            <h3><i class="fa {{ $stat->icon }}"></i> {{ $stat->label }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Qabul --}}
    <section id="qabul" class="section">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{ __("Qabul bo'limi") }}</h3>
                <p>{{ $admissionsIntro?->subtitle }}</p>
            </div>

            <div class="admission-steps">
                @foreach ($admissionSteps as $step)
                    <div class="admission-step">
                        <div class="step-number">{{ $step->step_number }}</div>
                        <h5>{{ $step->title }}</h5>
                        <p>{{ $step->description }}</p>
                    </div>
                @endforeach
            </div>

            <hr class="invis">

            <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-primary">{{ __("Hujjatlar ro'yxati") }}</a>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('contact') }}#qabul-arizasi" class="btn btn-default" style="border-color:#1B3A2D;color:#1B3A2D !important;">{{ __('Ariza shakli') }}</a>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section id="kursantlarga" class="section gb">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{ __("Bitiruvchilar va o'qituvchilar fikri") }}</h3>
                <p>{{ $testimonialsIntro?->subtitle }}</p>
            </div>

            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-4">
                        <div class="box testimonial">
                            <p class="testiname"><strong>{{ $testimonial->display_name }}</strong></p>
                            <p>{{ $testimonial->quote_text }}</p>
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa {{ $i <= $testimonial->rating ? 'fa-star' : 'fa-star-o' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Yangiliklar va e'lonlar --}}
    <section class="section">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{ __("Yangiliklar va e'lonlar") }}</h3>
                <p>{{ $newsIntro?->subtitle }}</p>
            </div>

            <div class="row">
                @foreach ($news as $item)
                    <div class="col-lg-4 col-md-12">
                        <div class="blog-box">
                            <div class="image-wrap entry">
                                @if ($item->cover_image)
                                    <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->title }}" class="img-responsive">
                                @else
                                    <div class="img-placeholder" role="img" aria-label="{{ $item->title }}"><i class="fa fa-newspaper-o" style="font-size:32px;"></i></div>
                                @endif
                            </div>
                            <div class="blog-desc">
                                <h4><a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a></h4>
                                <p>{{ $item->short_description }}</p>
                            </div>
                            <div class="post-meta">
                                <ul class="list-inline">
                                    <li><a href="#">{{ $item->published_at?->translatedFormat('d F Y') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ route('news.index') }}" class="readmore">{{ __('Barcha yangiliklar') }}</a>
            </div>

            <hr class="invis">

            <div class="row">
                <div class="col-md-12">
                    <div class="box" style="background-color:#F4F2EE;border:1px solid rgba(27,58,45,0.15);">
                        <h4><i class="fa fa-bullhorn" style="color:#C8A84B;"></i> {{ $announcementsBox?->title ?? __("E'lonlar") }}</h4>
                        <ul class="check">
                            @forelse ($announcements as $announcement)
                                <li>
                                    {{ $announcement->title }}
                                    @if ($announcement->date_start)
                                        : {{ $announcement->date_start->translatedFormat('d.m.Y') }}@if($announcement->date_end) — {{ $announcement->date_end->translatedFormat('d.m.Y') }}@endif
                                    @endif
                                </li>
                            @empty
                                <li>{{ __('Hozircha e\'lonlar yo\'q') }}</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- So'nggi ilmiy ishlar + Hamkorlar --}}
    <section class="section gb">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{ __("So'nggi ilmiy ishlar") }}</h3>
                <p>{{ $researchIntro?->subtitle }}</p>
            </div>

            <div class="row">
                @foreach ($research as $item)
                    <div class="col-lg-4 col-md-12">
                        <div class="blog-box">
                            <div class="image-wrap entry">
                                @if ($item->cover_image)
                                    <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->title }}" class="img-responsive">
                                @else
                                    <div class="img-placeholder" role="img" aria-label="{{ $item->title }}"><i class="fa fa-file-text-o" style="font-size:32px;"></i></div>
                                @endif
                            </div>
                            <div class="blog-desc">
                                <h4><a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a></h4>
                                <p>{{ $item->short_description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="invis">

            <div class="section-title text-center">
                <h3 style="font-size:20px;">{{ __('Hamkor tashkilotlar') }}</h3>
            </div>
            <div class="partners-row">
                @foreach ($partners as $partner)
                    <a href="{{ $partner->website_url ?? '#' }}" target="_blank" rel="noopener" title="{{ $partner->name }}">
                        @if ($partner->logo)
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="img-responsive" style="display:inline-block;max-height:60px;margin:0 15px;">
                        @else
                            <div class="img-placeholder partner-placeholder" role="img" aria-label="{{ $partner->name }}">{{ $partner->name }}</div>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Stipendiya callout --}}
    <section class="section bgcolor1">
        <div class="container">
            <a href="{{ route('contact') }}">
                <div class="row callout">
                    <div class="col-md-4 text-center">
                        <h3><i class="fa fa-shield"></i></h3>
                        <h4>{{ $scholarshipCallout?->title ?? __('Stipendiya va ijtimoiy kafolatlar') }}</h4>
                    </div>
                    <div class="col-md-8">
                        <p class="lead">{{ $scholarshipCallout?->subtitle ?? __("Barcha kursantlar davlat ta'minotida bo'lib, oylik stipendiya, kiyim-kechak, ovqatlanish va yotoqxona bilan ta'minlanadi.") }}</p>
                    </div>
                </div>
            </a>
        </div>
    </section>

@endsection

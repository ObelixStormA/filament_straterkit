@extends('layouts.app')

@section('title', "Aloqa — " . ($settings->site_name ?? 'AKTVA Instituti'))

@php($headerClass = 'header-normal')

@section('content')

    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>Biz bilan bog'lanish</h3>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">AKTVA Instituti</a></li>
                            <li class="active">Aloqa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section gb nopadtop">
        <div class="container">
            <div class="boxed boxedp4">

                @if ($settings->map_embed_url)
                    <iframe class="map-embed wow slideInUp" src="{{ $settings->map_embed_url }}" width="100%" height="420" frameborder="0" allowfullscreen="true" title="Institut manzili — xarita"></iframe>
                @endif

                <div class="row contactv2 text-center">
                    <div class="col-md-4">
                        <div class="small-box">
                            <i class="flaticon-email wow fadeIn"></i>
                            <h4>Biz bilan bog'laning</h4>
                            <small>Telefon: {{ $settings->phone_primary }}</small>
                            @if ($settings->phone_fax)
                                <small>Faks: {{ $settings->phone_fax }}</small>
                            @endif
                            <p><a href="mailto:{{ $settings->email_primary }}">{{ $settings->email_primary }}</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="small-box">
                            <i class="flaticon-map-with-position-marker wow fadeIn"></i>
                            <h4>Institut manzili</h4>
                            <small>{{ $settings->address }}</small>
                            @if ($settings->map_latitude && $settings->map_longitude)
                                <p><a href="https://www.google.com/maps?q={{ $settings->map_latitude }},{{ $settings->map_longitude }}" target="_blank">Google Xaritada ko'rish</a></p>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="small-box">
                            <i class="flaticon-share wow fadeIn"></i>
                            <h4>Ijtimoiy tarmoqlarda</h4>
                            @foreach ($footerSocialLinks ?? [] as $link)
                                <small>{{ ucfirst($link->platform) }}: <a href="{{ $link->url }}" target="_blank" rel="noopener">{{ $link->url }}</a></small>
                            @endforeach
                        </div>
                    </div>
                </div>

                @if (session('status'))
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="alert alert-success text-center">{{ session('status') }}</div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h3>Murojaat shakli</h3>
                            <p>Savol yoki takliflaringiz bo'lsa, quyidagi shakl orqali murojaat qiling.</p>
                        </div>

                        <form class="big-contact-form" method="POST" action="{{ route('contact.submit') }}">
                            @csrf
                            <input type="text" name="name" class="form-control" placeholder="Ismingizni kiriting.." value="{{ old('name') }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror

                            <input type="email" name="email" class="form-control" placeholder="Email manzilingiz.." value="{{ old('email') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror

                            <input type="text" name="phone" class="form-control" placeholder="Telefon raqamingiz.." value="{{ old('phone') }}">

                            <input type="text" name="subject" class="form-control" placeholder="Mavzu.." value="{{ old('subject') }}">

                            <textarea name="message" class="form-control" placeholder="Xabaringiz..." required>{{ old('message') }}</textarea>
                            @error('message') <small class="text-danger">{{ $message }}</small> @enderror

                            <button type="submit" class="btn btn-primary">Yuborish</button>
                        </form>
                    </div>
                </div>

                <hr class="invis">

                @if (session('applicationStatus'))
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="alert alert-success text-center">{{ session('applicationStatus') }}</div>
                        </div>
                    </div>
                @endif

                <div class="row" id="qabul-arizasi">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h3>Qabul arizasi</h3>
                            <p>Institutga o'qishga kirish uchun arizangizni shu yerda qoldiring — qabul komissiyasi siz bilan bog'lanadi.</p>
                        </div>

                        <form class="big-contact-form" method="POST" action="{{ route('admission.apply') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="first_name" class="form-control" placeholder="Ismingiz" value="{{ old('first_name') }}" required>
                                    @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" class="form-control" placeholder="Familiyangiz" value="{{ old('last_name') }}" required>
                                    @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" name="birth_year" class="form-control" placeholder="Tug'ilgan yil" value="{{ old('birth_year') }}" required>
                                    @error('birth_year') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control" placeholder="Telefon raqamingiz" value="{{ old('phone') }}" required>
                                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Email (ixtiyoriy)" value="{{ old('email') }}">
                            <select name="program_id" class="form-control">
                                <option value="">Yo'nalishni tanlang (ixtiyoriy)</option>
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}" @selected(old('program_id') == $program->id)>{{ $program->name }}</option>
                                @endforeach
                            </select>
                            <textarea name="message" class="form-control" placeholder="Qo'shimcha xabar (ixtiyoriy)">{{ old('message') }}</textarea>
                            <button type="submit" class="btn btn-primary">Ariza yuborish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

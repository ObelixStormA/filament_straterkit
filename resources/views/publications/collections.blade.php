@extends('layouts.app')

@section('title', "To'plamlar — " . ($settings->site_name ?? 'AKTVA Instituti'))

@php($headerClass = 'header-normal')

@section('content')

    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>To'plamlar</h3>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">AKTVA Instituti</a></li>
                            <li><a href="#">Ilmiy jurnallar</a></li>
                            <li class="active">To'plamlar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section gb nopadtop">
        <div class="container">
            <div class="boxed boxedp4">
                <div class="row blog-grid">
                    @forelse ($publications as $collection)
                        <div class="col-md-4">
                            <div class="course-box">
                                <div class="image-wrap entry">
                                    @if ($collection->cover_image)
                                        <img src="{{ Storage::url($collection->cover_image) }}" alt="{{ $collection->title }}" class="img-responsive">
                                    @else
                                        <div class="img-placeholder" role="img" aria-label="To'plam muqovasi"><i class="fa fa-book" style="font-size:36px;"></i></div>
                                    @endif
                                </div>
                                <div class="course-details">
                                    <h4>
                                        <small>{{ $collection->event_type }}</small>
                                        <a href="{{ $collection->file_url ? Storage::url($collection->file_url) : '#' }}" title="">{{ $collection->title }}</a>
                                    </h4>
                                    <p>{{ $collection->description }}</p>
                                </div>
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-calendar"></i> {{ $collection->year }}</a></li>
                                            @if ($collection->code_value)
                                                <li><a href="#"><i class="fa fa-file-text-o"></i> {{ $collection->code_type }} {{ $collection->code_value }}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        @if ($collection->file_url)
                                            <a href="{{ Storage::url($collection->file_url) }}" target="_blank"><i class="fa fa-download"></i> Yuklab olish</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            <p>Hozircha to'plamlar mavjud emas.</p>
                        </div>
                    @endforelse
                </div>

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12 text-center">
                        @include('partials.pagination', ['paginator' => $publications])
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

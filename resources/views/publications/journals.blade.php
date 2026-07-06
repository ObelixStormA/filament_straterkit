@extends('layouts.app')

@section('title', "Ilmiy jurnallar — " . ($settings->site_name ?? 'AKTVA Instituti'))

@php($headerClass = 'header-normal')

@section('content')

    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>Ilmiy jurnallar</h3>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">AKTVA Instituti</a></li>
                            <li><a href="#">Ilmiy jurnallar</a></li>
                            <li class="active">Jurnallar</li>
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
                    @forelse ($publications as $journal)
                        <div class="col-md-4">
                            <div class="course-box">
                                <div class="image-wrap entry">
                                    @if ($journal->cover_image)
                                        <img src="{{ Storage::url($journal->cover_image) }}" alt="{{ $journal->title }}" class="img-responsive">
                                    @else
                                        <div class="img-placeholder" role="img" aria-label="Jurnal muqovasi"><i class="fa fa-file-pdf-o" style="font-size:36px;"></i></div>
                                    @endif
                                </div>
                                <div class="course-details">
                                    <h4>
                                        <small>{{ $journal->year }}@if($journal->issue_number), {{ $journal->issue_number }}@endif</small>
                                        <a href="{{ $journal->file_url ? Storage::url($journal->file_url) : '#' }}" title="">{{ $journal->title }}</a>
                                    </h4>
                                    <p>{{ $journal->description }}</p>
                                </div>
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-calendar"></i> {{ $journal->year }}</a></li>
                                            @if ($journal->code_value)
                                                <li><a href="#"><i class="fa fa-book"></i> {{ $journal->code_type }} {{ $journal->code_value }}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        @if ($journal->file_url)
                                            <a href="{{ Storage::url($journal->file_url) }}" target="_blank"><i class="fa fa-download"></i> Yuklab olish</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            <p>Hozircha jurnallar mavjud emas.</p>
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

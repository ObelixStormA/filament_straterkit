@extends('layouts.app')

@section('title', $page->title . ' — ' . ($settings->site_name ?? 'AKTVA Instituti'))
@section('meta_description', $page->meta_description)

@php($headerClass = 'header-normal')

@section('content')

    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>{{ $page->title }}</h3>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">AKTVA Instituti</a></li>
                            <li class="active">{{ $page->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section gb nopadtop">
        <div class="container">
            <div class="boxed">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @if ($page->image)
                            <img src="{{ Storage::url($page->image) }}" alt="{{ $page->title }}" class="img-responsive img-rounded" style="margin-bottom:20px;">
                        @endif

                        <div class="blog-desc-big">
                            {!! $page->content_html !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

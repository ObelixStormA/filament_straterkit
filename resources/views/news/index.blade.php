@extends('layouts.app')

@section('title', "Yangiliklar — " . ($settings->site_name ?? 'AKTVA Instituti'))

@php($headerClass = 'header-normal')

@section('content')

    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>Yangiliklar</h3>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">AKTVA Instituti</a></li>
                            <li class="active">Yangiliklar</li>
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
                    <div class="col-md-8">
                        @forelse ($news as $item)
                            <div class="content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                        @if ($item->category)
                                            <small><a href="#">{{ $item->category->name }}</a></small>
                                        @endif
                                        <h3><a href="{{ route('news.show', $item->slug) }}" title="">{{ $item->title }}</a></h3>
                                        <ul class="list-inline">
                                            <li>{{ $item->published_at?->translatedFormat('d F Y') }}</li>
                                            @if ($item->author_name)
                                                <li><span>muallif</span> {{ $item->author_name }}</li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div class="blog-media">
                                        <a href="{{ route('news.show', $item->slug) }}" title="">
                                            @if ($item->cover_image)
                                                <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->title }}" class="img-responsive img-rounded">
                                            @else
                                                <div class="img-placeholder" role="img" aria-label="{{ $item->title }}"><i class="fa fa-newspaper-o" style="font-size:48px;"></i></div>
                                            @endif
                                        </a>
                                    </div>

                                    <div class="blog-desc-big">
                                        <p class="lead">{{ $item->short_description }}</p>
                                        <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary">Batafsil</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Hozircha yangiliklar mavjud emas.</p>
                        @endforelse

                        <div class="row">
                            <div class="col-md-12">
                                @include('partials.pagination', ['paginator' => $news])
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 sidebar">
                        <div class="widget clearfix">
                            <h3 class="widget-title">So'nggi yangiliklar</h3>
                            <div class="post-widget">
                                @foreach ($news->take(3) as $recent)
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="mt-0"><a href="{{ route('news.show', $recent->slug) }}">{{ $recent->title }}</a></h5>
                                            <div class="blog-meta">
                                                <ul class="list-inline">
                                                    <li>{{ $recent->published_at?->translatedFormat('d F Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@extends('layouts.app')

@section('title', $news->title . ' — ' . ($settings->site_name ?? 'AKTVA Instituti'))
@section('meta_description', $news->meta_description ?? $news->short_description)

@php($headerClass = 'header-normal')

@section('content')

    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>{{ $news->title }}</h3>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">AKTVA Instituti</a></li>
                            <li><a href="{{ route('news.index') }}">Yangiliklar</a></li>
                            <li class="active">{{ $news->title }}</li>
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
                        <div class="content blog-list">
                            <div class="blog-wrapper clearfix">
                                <div class="blog-meta">
                                    @if ($news->category)
                                        <small><a href="#">{{ $news->category->name }}</a></small>
                                    @endif
                                    <h3>{{ $news->title }}</h3>
                                    <ul class="list-inline">
                                        <li>{{ $news->published_at?->translatedFormat('d F Y') }}</li>
                                        @if ($news->author_name)
                                            <li><span>muallif</span> {{ $news->author_name }}</li>
                                        @endif
                                        <li><i class="fa fa-eye"></i> {{ $news->views_count }}</li>
                                    </ul>
                                </div>

                                @if ($news->cover_image)
                                    <div class="blog-media">
                                        <img src="{{ Storage::url($news->cover_image) }}" alt="{{ $news->title }}" class="img-responsive img-rounded">
                                    </div>
                                @endif

                                <div class="blog-desc-big">
                                    <p class="lead">{{ $news->short_description }}</p>
                                    {!! $news->content_html !!}

                                    @if ($news->external_link)
                                        <p><a href="{{ $news->external_link }}" target="_blank" rel="noopener">Manba havolasi</a></p>
                                    @endif
                                    @if ($news->file_url)
                                        <p><a href="{{ Storage::url($news->file_url) }}" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Faylni yuklab olish</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 sidebar">
                        <div class="widget clearfix">
                            <h3 class="widget-title">Boshqa yangiliklar</h3>
                            <div class="post-widget">
                                @forelse ($recent as $item)
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="mt-0"><a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a></h5>
                                            <div class="blog-meta">
                                                <ul class="list-inline">
                                                    <li>{{ $item->published_at?->translatedFormat('d F Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>Boshqa yangiliklar yo'q.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

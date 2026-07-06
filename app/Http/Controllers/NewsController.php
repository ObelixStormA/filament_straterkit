<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::query()
            ->published()
            ->where('is_research', false)
            ->with('category')
            ->latest('published_at')
            ->paginate(6);

        return view('news.index', compact('news'));
    }

    public function show(string $slug): View
    {
        $news = News::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->with('category')
            ->firstOrFail();

        $news->increment('views_count');

        $recent = News::query()
            ->published()
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('news.show', compact('news', 'recent'));
    }
}

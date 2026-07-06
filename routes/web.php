<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/til/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

Route::get('/yangiliklar', [NewsController::class, 'index'])->name('news.index');
Route::get('/yangiliklar/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/jurnallar', [PublicationController::class, 'journals'])->name('publications.journals');
Route::get('/toplamlar', [PublicationController::class, 'collections'])->name('publications.collections');

Route::get('/aloqa', [ContactController::class, 'show'])->name('contact');
Route::post('/aloqa', [ContactController::class, 'store'])->name('contact.submit');
Route::post('/qabul-arizasi', [ContactController::class, 'storeApplication'])->name('admission.apply');

Route::get('/sahifa/{slug}', [PageController::class, 'show'])->name('pages.show');

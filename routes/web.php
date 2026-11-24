<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ScaleModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\FilterController;

Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');

Route::get('/', function () {
    return view('welcome');
})->name("main");
Route::get(
    '/blog/admin',
    [BlogController::class, 'admin']
)->name('blog.admin');
Route::get(
    '/blog/{blog}/tags',
    [BlogController::class, 'tags']
)->name('blog.tags');
Route::post(
    '/blog/{blog}/tags',
    [BlogController::class, 'tagsStore']
)->name('blog.tags.store');

Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');
Route::get('/participation', [SiteController::class, 'participation'])->name('participation.form');
Route::post('/participation', [SiteController::class, 'participationStore'])->name('participation.store');
Route::get('participation/confirm', [SiteController::class, 'participationConfirm'])->name('participation.confirm');
Route::view('/about','site.about')->name('site.about');
Route::view('/contact','site.contact')->name('site.contact');
Route::get('/passport', [SiteController::class, 'getPassport'])->name('site.passport');

Route::resource('country', CountryController::class);
Route::resource('model', ScaleModelController::class);
Route::resource('blog', BlogController::class);
Route::resource('filters', FilterController::class)
    ->except(['show']);

Route::get('/stats',[StatsController::class, 'pages'])->name('stats.pages');
Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats/popular-models', [StatsController::class, 'popularModels'])->name('stats.popular');

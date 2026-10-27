<?php

use App\Http\Controllers\ScaleModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StatsController;

Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');

Route::get('/', function () {
    return view('welcome');
})->name("main");

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

Route::get('/stats',[StatsController::class, 'pages'])->name('stats.pages');
Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats/popular-models', [StatsController::class, 'popularModels'])->name('stats.popular');

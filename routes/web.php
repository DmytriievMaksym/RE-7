<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');

Route::get('/', function () {
    return view('welcome');
})->name("main");

Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');
Route::get('/participation', [SiteController::class, 'participation'])->name('participation.form');
Route::post('/participation', [SiteController::class, 'participationStore'])->name('participation.store');
Route::view('/about','site.about')->name('site.about');
Route::view('/contact','site.contact')->name('site.contact');
Route::get('/passport', [SiteController::class, 'passport'])->name('site.passport');

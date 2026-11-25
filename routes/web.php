<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ScaleModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/say/{message?}', [SiteController::class, 'say'])->name('site.say');

Route::get('/', function () {
    return view('welcome');
})->name("main");
Route::middleware('auth')->group(function () {
    Route::get('/blog/admin', [
        BlogController::class, 'admin'
    ])->name('blog.admin');
    Route::get('/blog/{blog}/tags', [
        BlogController::class, 'tags'
    ])->name('blog.tags');
    Route::post('/blog/{blog}/tags', [
        BlogController::class, 'tagsStore'
    ])->name('blog.tags.store');
    Route::resource('blog', BlogController::class)
        ->except(['index', 'show']);
    Route::resource('filters', FilterController::class)
        ->except(['show']);
    Route::get('/users', [
        UserController::class, 'index'
    ])->name('users.index');
    Route::get('/stats',[StatsController::class, 'pages'])->name('stats.pages');
    Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
    Route::get('/stats/popular-models', [StatsController::class, 'popularModels'])->name('stats.popular');
    Route::resource('model', ScaleModelController::class)->except(['index', 'show']);
});

Route::get('/blog', [
    BlogController::class, 'index'
])->name('blog.index');
Route::get('/blog/{blog}', [
    BlogController::class, 'show'
])->name('blog.show');
Route::get('/model', [
    ScaleModelController::class, 'index'
])->name('model.index');
Route::get('/model/{model}', [
    ScaleModelController::class, 'show'
])->name('model.show');

Route::get('/entry', [SiteController::class, 'entry'])->name('entry.form');
Route::post('/entry', [SiteController::class, 'entryStore'])->name('entry.store');
Route::get('/participation', [SiteController::class, 'participation'])->name('participation.form');
Route::post('/participation', [SiteController::class, 'participationStore'])->name('participation.store');
Route::get('participation/confirm', [SiteController::class, 'participationConfirm'])->name('participation.confirm');
Route::view('/about','site.about')->name('site.about');
Route::view('/contact','site.contact')->name('site.contact');
Route::get('/passport', [SiteController::class, 'getPassport'])->name('site.passport');

Route::resource('country', CountryController::class);

Route::view('/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

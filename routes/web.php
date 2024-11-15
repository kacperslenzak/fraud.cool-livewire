<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\MetaImageController;
use App\Http\Controllers\UrlViewController;
use App\Http\Middleware\BannedMiddleware;

Route::view('/', 'welcome')->name('index');

Route::prefix('dashboard')->middleware(['auth', 'verified', BannedMiddleware::class])->group(function () {
    Route::get('/', [ProfileController::class, 'index'])
        ->name('dashboard');

    Route::post('/', [ProfileController::class, 'update'])
        ->name('dashboard.update');

    Route::get('/links', [LinksController::class, 'index'])
        ->name('links');

    Route::get('/link-types', [LinksController::class, 'linkTypes'])
    ->name('link-types')->middleware(AdminMiddleware::class);

    Route::get('/users', [AdminController::class, 'users'])
    ->name('users')->middleware(AdminMiddleware::class);

    Route::patch('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])
    ->name('users.toggle-admin')->middleware(AdminMiddleware::class);

    Route::delete('/users/{user}', [AdminController::class, 'destroy'])
    ->name('users.destroy')->middleware(AdminMiddleware::class);

    Route::get('/analytics', [AnalyticsController::class, 'index'])
        ->name('analytics');

    Route::patch('/users/{user}/toggle-banned', [AdminController::class, 'toggleBanned'])
    ->name('users.toggle-banned')->middleware(AdminMiddleware::class);
});

require __DIR__.'/auth.php';

Route::get('/{username}', [ProfileController::class, 'showUserProfile'])
    ->name('profile');

Route::get('/image/{username}', [MetaImageController::class, 'show'])
    ->name('image');

Route::get('/redirect/{username}/{link_id}', [UrlViewController::class, 'redirect'])
    ->name('redirect');

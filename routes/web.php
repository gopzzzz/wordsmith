<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

 use App\Http\Controllers\TestimonialController;
 
use App\Http\Controllers\PageEditController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');


 Route::get('/page', [HomeController::class, 'page'])->name('page.list');

Route::get('/testimonials', [TestimonialController::class, 'index'])
    ->name('testimonials.index');


Route::post('/testimonials', [TestimonialController::class, 'store'])
    ->name('testimonials.store');


Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])
    ->name('testimonials.update');


Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy'])
    ->name('testimonials.destroy');


Route::get('/page-edit', [PageEditController::class, 'index'])
    ->name('page_edit');

Route::post('/page-edit', [PageEditController::class, 'save'])
    ->name('page_edit.save');
 


require __DIR__.'/auth.php';

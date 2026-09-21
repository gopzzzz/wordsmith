<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WebController;





 use App\Http\Controllers\TestimonialController;
 
use App\Http\Controllers\PageEditController;

Route::get('/', [WebController::class, 'index']);

 Route::get('/index', [WebController::class, 'index'])->name('index');
  Route::get('/aboutus', [WebController::class, 'aboutus'])->name('aboutus');
  Route::get('/ourservices', [WebController::class, 'ourservices'])->name('ourservices');
  Route::get('/ourblogs', [WebController::class, 'ourblogs'])->name('ourblogs');
   Route::get('/blogdetails', [WebController::class, 'blogdetails'])->name('blogdetails');



/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'nocache'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

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
 





Route::get('/banners', [BannerController::class, 'index'])
    ->name('banners.index');

Route::post('/banners/store', [BannerController::class, 'store'])
    ->name('banners.store');

Route::post('/banners/update/{id}', [BannerController::class, 'update'])
    ->name('banners.update');

Route::get('/banners/delete/{id}', [BannerController::class, 'destroy'])
    ->name('banners.delete');






Route::get('/portfolio', [PortfolioController::class, 'index'])
    ->name('portfolio.index');

Route::post('/portfolio/store', [PortfolioController::class, 'store'])
    ->name('portfolio.store');

Route::post('/portfolio/update/{id}', [PortfolioController::class, 'update'])
    ->name('portfolio.update');

Route::get('/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])
    ->name('portfolio.delete');




Route::get('/services', [ServiceController::class, 'index'])
    ->name('services.index');

Route::post('/services/store', [ServiceController::class, 'store'])
    ->name('services.store');

Route::post('/services/update/{id}', [ServiceController::class, 'update'])
    ->name('services.update');

Route::get('/services/delete/{id}', [ServiceController::class, 'destroy'])
    ->name('services.delete');


Route::get('/blogs', [BlogController::class, 'index'])
    ->name('blogs.index');

Route::post('/blogs', [BlogController::class, 'store'])
    ->name('blogs.store');

Route::put('/blogs/{id}', [BlogController::class, 'update'])
    ->name('blogs.update');


require __DIR__.'/auth.php';

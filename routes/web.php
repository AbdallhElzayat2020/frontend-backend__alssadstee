<?php

use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\FacilitiesController;
use App\Http\Controllers\Website\FaqController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\IntegratedSystemController;
use App\Http\Controllers\Website\JobController;
use App\Http\Controllers\Website\MediaController;
use App\Http\Controllers\Website\ProductsController;
use App\Http\Controllers\Website\QualityController;
use App\Http\Controllers\Website\QuoteController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Admin routes (must be loaded first to avoid conflicts with website routes)
require __DIR__ . '/dashboard.php';

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],

    function () {

        /* ====================================================================================================================
        ==========================================================  Website Routes ============================================ */

        // Home page (root)
        Route::get('/', [HomeController::class, 'index'])->name('home');

        // Products (keep dynamic with translatable slugs)
        Route::get('/products', [ProductsController::class, 'index'])->name('products');
        Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');

        // Static pages - English routes
        Route::get('/about', [AboutController::class, 'index'])->name('about');
        Route::get('/facilities', [FacilitiesController::class, 'index'])->name('facilities');
        Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');
        Route::get('/integrated-system', [IntegratedSystemController::class, 'index'])->name('integrated-system');
        Route::get('/media', [MediaController::class, 'index'])->name('media');
        Route::get('/quality', [QualityController::class, 'index'])->name('quality');
        Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
        Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
        Route::get('/quote', [QuoteController::class, 'index'])->name('quote');

        Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
        Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');

        // Blog
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/category/{categorySlug}', [BlogController::class, 'byCategory'])->name('blog.category');
        Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    }
);

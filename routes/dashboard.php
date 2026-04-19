<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\BlogCategoryController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\QuoteController;
use App\Http\Controllers\Dashboard\JobAppliedController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\StaticPageSeoController;
use App\Http\Controllers\Dashboard\UrlRedirectController;
use Illuminate\Support\Facades\Route;

/* Public Routes Dashboard - Auth */

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');

/* Protected Routes - Dashboard */
Route::middleware(['auth'])->prefix('admin')->name('dashboard.')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    // Contacts Routes
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Quotes Routes
    Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
    Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('quotes.show');
    Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy');

    // Job Applications Routes
    Route::get('/job-applications', [JobAppliedController::class, 'index'])->name('job-applications.index');
    Route::get('/job-applications/{application}', [JobAppliedController::class, 'show'])->name('job-applications.show');
    Route::delete('/job-applications/{application}', [JobAppliedController::class, 'destroy'])->name('job-applications.destroy');

    // FAQs Routes
    Route::resource('faqs', FaqController::class)->except(['show']);

    // Products Routes
    Route::resource('products', ProductController::class)->except(['show']);

    // Static website pages SEO
    Route::get('/page-seo', [StaticPageSeoController::class, 'index'])->name('page-seo.index');
    Route::get('/page-seo/{static_page_seo}/edit', [StaticPageSeoController::class, 'edit'])->name('page-seo.edit');
    Route::put('/page-seo/{static_page_seo}', [StaticPageSeoController::class, 'update'])->name('page-seo.update');

    Route::resource('url-redirects', UrlRedirectController::class)->except(['show']);

    // Blog Categories
    Route::resource('blog-categories', BlogCategoryController::class)->except(['show']);

    // Blog Posts
    Route::resource('blogs', BlogController::class)->except(['show']);

    // Profile Routes
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

/* Logout Route - Must be outside prefix to work correctly */
Route::middleware(['auth'])->post('/admin/logout', [LoginController::class, 'logout'])->name('dashboard.logout');

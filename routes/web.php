<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CampaignUpdateController;

// Public routes
Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaign.index');

Route::get('/how-it-works', function () {
    return view('pages.how-it-works');
})->name('how-it-works');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile routes
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile/edit', [AuthController::class, 'profile'])->name('profile.edit');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

    // Campaign routes
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaign.create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaign.store');
    Route::get('/campaigns/{id}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
    Route::put('/campaigns/{id}', [CampaignController::class, 'update'])->name('campaign.update');

    // Donation routes
    Route::get('/donate/{id}', [DonationController::class, 'form'])->name('donation.form');
    Route::post('/donate/{id}/process', [DonationController::class, 'process'])->name('donation.process');
    Route::post('/donate/{id}/confirm', [DonationController::class, 'confirm'])->name('donation.confirm');

    // User dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Campaign updates
    Route::get('/campaigns/{id}/update/create', [CampaignUpdateController::class, 'create'])->name('campaign.update.create');
    Route::post('/campaigns/{id}/update', [CampaignUpdateController::class, 'store'])->name('campaign.update.store');
});

Route::get('/campaigns/{id}', [CampaignController::class, 'show'])->name('campaign.show');

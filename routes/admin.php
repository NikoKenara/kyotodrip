<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // profile routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'UpdateProfile'])->name('profile.update');

    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Slider Routers
    Route::resource('slider', SliderController::class);

    // Slider Routers
    Route::resource('why-choose-us', WhyChooseUsController::class);

    // why choose us routes
    Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title.update');
    Route::resource('why-choose-us', WhyChooseUsController::class);

});

<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\Settings\SettingsProfileController;
use App\Http\Controllers\Settings\SettingsRoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('locale/{locale}', [LocaleController::class, 'update'])->name('locale.update');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');

    Route::middleware(['administrator'])->group(function (): void {
        // profile
        Route::get('settings/profile', [SettingsProfileController::class, 'index'])->name('settings.profile.index');

        // roles
        Route::get('settings/roles', [SettingsRoleController::class, 'index'])->name('settings.role.index');
        Route::get('settings/roles/new', [SettingsRoleController::class, 'new'])->name('settings.role.new');
        Route::post('settings/roles', [SettingsRoleController::class, 'store'])->name('settings.role.store');
        Route::get('settings/roles/{role}', [SettingsRoleController::class, 'edit'])->name('settings.role.edit');
        Route::put('settings/roles/{role}', [SettingsRoleController::class, 'edit'])->name('settings.role.edit');
        Route::delete('settings/roles/{role}', [SettingsRoleController::class, 'destroy'])->name('settings.role.destroy');
    });
});

require __DIR__ . '/auth.php';

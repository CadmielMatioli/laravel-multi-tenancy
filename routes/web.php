<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChooseTenancyController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['choose-tenancy'])->group(function () {
        Route::get('choose-tenancy', [ChooseTenancyController::class, 'index'])->name('choose-tenancy.index');
        Route::post('choose-tenancy', [ChooseTenancyController::class, 'store'])->name('choose-tenancy.store');


        Route::middleware(['tenancy', 'load-permissions'])->group(function () {
            Route::get('/dashboard', function () {
                return view('pages.dashboard');
            })->name('dashboard');


            Route::get('/companies', [CompanyController::class, 'create'])->name('companies.create');
            Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
            Route::get('/companies/{company}', [CompanyController::class, 'edit'])->name('companies.edit');
            Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
            Route::delete('/companies/{company}', [CompanyController::class, 'delete'])->name('companies.destroy');

            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        });
    });

});

require __DIR__.'/auth.php';

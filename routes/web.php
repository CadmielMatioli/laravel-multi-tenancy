<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
//    Route::middleware(['choose-tenancy'])->group(function () {
//        Route::get('choose-tenancy', function () {
//            session()->put('company_id', 1);
//            return redirect()->to('dashboard');
//        })->name('choose-tenancy');


//        Route::middleware(['tenancy'])->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');

            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//        });
//    });

});

require __DIR__.'/auth.php';

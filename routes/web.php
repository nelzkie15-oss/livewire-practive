<?php
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Register;
 Route::get('/', Home::class)->name('home')->middleware('auth');
 Route::group(['middleware'=>'guest'], function () {
    //Route::get('/', Home::class)->name('home');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);
});

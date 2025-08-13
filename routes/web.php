<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/single-blog', 'singleBlog')->name('single-blog');
    Route::get('/service', 'service')->name('service');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/policy/slug', 'policy')->name('policy');
});
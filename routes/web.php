<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', 'FrontendController@index');;

Route::get('/berita', function () {
    return view('news', [
        'parent' => 'Berita'
    ]);
});

Route::get('/kesenian', function () {
    return view('kesenian', [
        'parent' => 'Kesenian'
    ]);
});
// Start UMKM
Route::get('/umkm', 'Frontend\UmkmController@index')->name('frontend.umkm');
Route::get('/umkm-detail/{id}', 'Frontend\UmkmController@show')->name('frontend.umkm.show');
// End UMKM

Route::middleware(['guest'])->group(function () {
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login')->name('login-post');
});

Route::middleware(['auth'])->prefix("admin")->group(function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name("dashboard");
    Route::post('/logout', 'AuthController@logout')->name('logout');
    Route::get('/change-password', 'AuthController@changePassword')->name('change-password');
    Route::post('/change-password', 'AuthController@submitChangePassword')->name('change.password');

    Route::middleware('superadmin')->group(function(){
        Route::get('/user', 'Admin\AdminController@index')->name('admin.index');
        Route::get('/user/create', 'Admin\AdminController@create')->name('admin.create');
        Route::post('/user', 'Admin\AdminController@store')->name('admin.post');
        Route::get('/user/{id}', 'Admin\AdminController@edit')->name('admin.edit');
        Route::put('/user/{id}/edit', 'Admin\AdminController@update')->name('admin.update');
        Route::get('/user/{id}/edit-password', 'Admin\AdminController@editPassword')->name('admin.edit.password');
        Route::put('/user/{id}/edit-password', 'Admin\AdminController@updatePassword')->name('admin.update.password');
    });

    Route::get('/demografi', 'Admin\DemografiController@index')->name('demografi.index');
    Route::get('/demografi/{id}/edit', 'Admin\DemografiController@edit')->name('demografi.edit');
    Route::put('/demografi/{id}/edit', 'Admin\DemografiController@update')->name('demografi.update');

    Route::get('/umkm', 'Admin\MSMEsController@index')->name("umkm.index");
    Route::get('/umkm/create', 'Admin\MSMEsController@create')->name("umkm.create");
    Route::post('/umkm', 'Admin\MSMEsController@store')->name("umkm.store");
    Route::get('/umkm/{id}/edit', 'Admin\MSMEsController@edit')->name("umkm.edit");
    Route::put('/umkm/{id}', 'Admin\MSMEsController@update')->name("umkm.update");

    Route::get("/category", 'Admin\CategoryController@index')->name('category.index');
    Route::get("/category/create", 'Admin\CategoryController@create')->name('category.create');
    Route::post("/category", 'Admin\CategoryController@store')->name('category.store');
    Route::get("/category/{id}/edit", 'Admin\CategoryController@edit')->name('category.edit');
    Route::put("/category/{id}", 'Admin\CategoryController@update')->name('category.update');

    Route::get("/blog", "Admin\BlogController@index")->name("blog.index");
    Route::get("/blog/create", "Admin\BlogController@create")->name("blog.create");
    Route::post("/blog/store", "Admin\BlogController@store")->name("blog.store");
    Route::get("/blog/{id}/edit", "Admin\BlogController@edit")->name("blog.edit");
    Route::put("/blog/{id}", "Admin\BlogController@update")->name("blog.update");
    Route::delete("/blog/{id}", "Admin\BlogController@destroy")->name("blog.destroy");
});

// inject command artisan
Route::prefix('command')->group(function () {
    Route::get('/optimize', 'InjectCommandController@clear');
    Route::get('/db', 'InjectCommandController@db');
});
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', 'FrontendController@index');
Route::get('/umkm', "FrontendController@umkm")->name("fe.umkm");
Route::get('/umkm/{slug}', "FrontendController@detailUmkm")->name("fe.umkm.detail");
Route::get('/berita', "FrontendController@news")->name("fe.news");
Route::get('/berita/{slug}', "FrontendController@newsDetail")->name("fe.news.detail");


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

    Route::middleware('superadmin')->group(function () {
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
    Route::delete("/umkm/{id}", 'Admin\MSMEsController@destroy')->name('umkm.destroy');

    Route::get("/category", 'Admin\CategoryController@index')->name('category.index');
    Route::get("/category/create", 'Admin\CategoryController@create')->name('category.create');
    Route::post("/category", 'Admin\CategoryController@store')->name('category.store');
    Route::get("/category/{id}/edit", 'Admin\CategoryController@edit')->name('category.edit');
    Route::put("/category/{id}", 'Admin\CategoryController@update')->name('category.update');
    Route::delete("/category/{id}", 'Admin\CategoryController@destroy')->name('category.destroy');

    Route::get("/blog", "Admin\BlogController@index")->name("blog.index");
    Route::get("/blog/create", "Admin\BlogController@create")->name("blog.create");
    Route::post("/blog/store", "Admin\BlogController@store")->name("blog.store");
    Route::get("/blog/{id}/edit", "Admin\BlogController@edit")->name("blog.edit");
    Route::put("/blog/{id}", "Admin\BlogController@update")->name("blog.update");
    Route::delete("/blog/{id}", "Admin\BlogController@destroy")->name("blog.destroy");

    Route::get("/gallery", "Admin\GalleryController@index")->name("gallery.index");
    Route::get("/gallery/create", "Admin\GalleryController@create")->name("gallery.create");
    Route::post("/gallery/store", "Admin\GalleryController@store")->name("gallery.store");
    Route::get("/gallery/{id}/edit", "Admin\GalleryController@edit")->name("gallery.edit");
    Route::put("/gallery/{id}", "Admin\GalleryController@update")->name("gallery.update");
    Route::delete("/gallery/{id}", "Admin\GalleryController@destroy")->name("gallery.destroy");

    Route::get("/clothing", "Admin\CustomClothingRentalController@index")->name("clothing.index");
    Route::get("/clothing/create", "Admin\CustomClothingRentalController@create")->name("clothing.create");
    Route::post("/clothing/store", "Admin\CustomClothingRentalController@store")->name("clothing.store");
    Route::get("/clothing/{id}/edit", "Admin\CustomClothingRentalController@edit")->name("clothing.edit");
    Route::put("/clothing/{id}", "Admin\CustomClothingRentalController@update")->name("clothing.update");
    Route::delete("/clothing/{id}", "Admin\CustomClothingRentalController@destroy")->name("clothing.destroy");
});

// inject command artisan
Route::prefix('command')->group(function () {
    Route::get('/optimize', 'InjectCommandController@clear');
    Route::get('/db', 'InjectCommandController@db');
});

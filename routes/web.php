<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses' => 'UsersController@index']);

// Route::name('site.')->group(function () {
//     Route::get('/', [SiteController::class, 'home'])->name('home');
//     Route::get('/brands', [SiteController::class, 'brand'])->name('brands');
//     Route::get('/termsofuse', [SiteController::class, 'termsofuse'])->name('termsofuse');
//     Route::get('/forms', [SiteController::class, 'forms'])->name('forms');
//     Route::get('/formsthanks', [SiteController::class, 'formsthanks'])->name('formsthanks');
//     Route::get('/optforms/{company?}/{token?}', [SiteController::class, 'optforms'])->name('company.employee.create');
//     Route::get('/optformsthanks/{employee?}/{token?}', [SiteController::class, 'optformsthanks'])->name('optformsthanks');

//     Route::name('brands.')->group(function () {
//         Route::post('sendEmail', [BrandController::class, 'sendEmail'])->name('sendEmail');
//     });
// });


Route::post('/login', ['uses' => 'UsersController@login'])->name("login");
//Route::get('/home', ['uses' => 'DashboardController@index']);

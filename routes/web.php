<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\FrontController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('dashboard', [FrontController::class, 'dashboard'])->name('dashboard');
Route::get('users', [FrontController::class, 'users'])->name('users');
Route::get('login', [FrontController::class, 'login_page'])->name('login');
Route::get('logout', [FrontController::class, 'logout_page'])->name('logout');
Route::post('category/store', [FrontController::class, 'categoryStore'])->name('category/store');
Route::get('category/list', [FrontController::class, 'category_list'])->name('category/list');
Route::get('category/edit/{id}', [FrontController::class, 'category_edit'])->name('category.edit');

Route::post('api/postData', [ApiController::class, 'postData'])->name('api/postData');
Route::get('categoryList', [ApiController::class, 'category_list'])->name('categoryList');

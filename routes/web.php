<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('Homepage/homepage',[HomepageController::class,'index']);
Route::get('Homepage/menu',[HomepageController::class,'menu']);

Route::get('Login/login',[LoginController::class,'login']);

Route::get('/Register/register',[RegisterController::class,'register']); 

Route::get('Admin/admin',[AdminController::class,'admin'])->middleware('isLoggedIn');
Route::get('Admin/pages/tables',[AdminController::class,'FoodProduct'])->middleware('isLoggedIn');
Route::get('Admin/pages/edit/{id}', [AdminController::class, 'edit']);
Route::get('Admin/pages/profile/{id}', [AdminController::class, 'profileAdmin']);
Route::post('update', [AdminController::class, 'update']);
Route::post('updateProfile',[AdminController::class, 'updateProfileAdmin']);

Route::post('Admin/CheckLogin',[AdminController::class,'checkLogin'])->name('CheckLogin969');
Route::get('Admin/Logout',[AdminController::class,'Logout'])->name('Logout969');
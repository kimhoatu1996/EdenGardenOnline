<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;    

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

Route::get('Homepage/homepage',[HomepageController::class,'index']);
Route::get('Homepage/menu',[HomepageController::class,'menu']);

Route::get('Admin/admin',[AdminController::class,'admin'])->middleware('isLoggedIn');
Route::get('Admin/pages/tables',[AdminController::class,'FoodProduct'])->middleware('isLoggedIn');
Route::get('Admin/pages/edit/{id}', [AdminController::class, 'edit'])->middleware('isLoggedIn');
Route::get('Admin/pages/profile/{id}', [AdminController::class, 'profileAdmin'])->middleware('isLoggedIn');
Route::get('Admin/pages/editdetails/{id}', [AdminController::class, 'editdetails'])->middleware('isLoggedIn');
Route::get('Admin/pages/addproduct',[AdminController::class, 'addproduct'])->middleware('isLoggedIn');
Route::post('update', [AdminController::class, 'update'])->middleware('isLoggedIn');
Route::post('updateProfile',[AdminController::class, 'updateProfileAdmin'])->middleware('isLoggedIn');
Route::post('updatedetails', [AdminController::class, 'updatedetails'])->middleware('isLoggedIn');
Route::post('save', [AdminController::class, 'save'])->middleware('isLoggedIn');
Route::get('delete/{id}', [AdminController::class,'delete']);
Route::get('Admin/Logout',[AdminController::class,'Logout'])->name('Logout969');
Route::get('Admin/accountcustomer',[AdminController::class,'accountcustomer'])->middleware('isLoggedIn');
Route::get('Admin/employee',[AdminController::class,'employee'])->middleware('isLoggedIn');
Route::get('DeleteEmployee/{id}',[AdminController::class,'DeleteEmployee']);
Route::get('Admin/editEmployee/{id}',[AdminController::class,'editEmployee'])->middleware('isLoggedIn');
Route::post('updateEmployee',[AdminController::class,'updateEmployee']);
Route::post('saveEmployee',[AdminController::class,'saveEmployee'])->middleware('isLoggedIn');
Route::get('Admin/pages/addemployee',[AdminController::class,'addEmployee'])->middleware('isLoggedIn');
Route::get('deleteAccountcustomer/{id}', [AdminController::class,'deleteAccountcustomer']);
Route::get('Admin/editcustomer/{id}',[AdminController::class,'editcustomer'])->middleware('isLoggedIn');



Route::get('Customer/customer',[CustomerController::class,'customerindex'])->middleware('Customerchecklogin');
Route::get('Customer/kindoffoodcustomer/{id}',[CustomerController::class,'kindsoffoodindex'])->middleware('Customerchecklogin');
Route::get('Customer/customerprofile/{id}',[CustomerController::class,'getCustomer'])->middleware('Customerchecklogin');
Route::get('/buy/{foodid}', [CustomerController::class, 'buy'])->name('buy');
Route::get('/logout', [CustomerController::class, 'logoutCustomer'])->name('customer.logout');
Route::get('Customer/customerorder', [CustomerController::class, 'orderview'])->middleware('Customerchecklogin');
Route::get('Customer/DeleteElementOrder/{id}',[CustomerController::class, 'DeleteElementOrder']);
Route::post('Customer/SaveChanges', [CustomerController::class, 'SaveChanges']);

Route::get('/Register/register',[RegisterController::class,'register']); 
Route::post('Register/register', [RegisterController::class,'registeraccount']);


Route::post('Login/CheckLogin',[LoginController::class,'checkLogin'])->name('CheckLogin969');
Route::get('Login/login',[LoginController::class,'login']);
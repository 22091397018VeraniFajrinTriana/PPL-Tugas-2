<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('contact', [UserController::class, 'contact'])->name('contact');
// Insertt
Route::post('contact.insert', [UserController::class, 'contact_insert'])->name('contact.insert');
Route::get('contact.insertview', [UserController::class, 'contact_insert_view'])->name('contact.insertview');
// Update
Route::put('contact.update', [UserController::class, 'contact_update'])->name('contact.update');
Route::get('contact.updateview', [UserController::class, 'contact_update_view'])->name('contact.updateview');
//Delete
Route::delete('contact.delete', [UserController::class, 'contact_delete'])->name('contact.delete');

Route::get('address', [UserController::class, 'address'])->name('address');
Route::post('address.insert', [UserController::class, 'address_insert'])->name('address.insert');
Route::get('address.insertview', [UserController::class, 'address_insert_view'])->name('address.insertview');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameAccountController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;

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

// Search Game Account
Route::get('/gameAccount/search', [GameAccountController::class, 'searchGameAccount'])->name('Search Game Account');
// Home Page
Route::get('/', [GameAccountController::class, 'indexGameAccount'])->name('Home Page');
// Game Account Detail
// Route::get('/gameAccount/{id}', [GameAccountController::class, 'showGameAccount'])->name('View Game Account');
// View Game Account by Type
Route::get('/type/{type}', [TypeController::class, 'getType']);
// Game Account Detail
Route::get('/view_gameAccount/{gameAccount}', [GameAccountController::class, 'getGameAccountDetail'])
->name('Game Account Page');

Route::middleware('GuestOnly')->group(function () {
    // Login
    Route::get('/auth/login',[UserController::class,'index_login'])->name('index_login');
    Route::post('/auth/login',[UserController::class,'login'])->name('login');
    // Register
    Route::get('/auth/register',[UserController::class,'index_register'])->name('index_register');
    Route::post('/auth/register',[UserController::class,'register'])->name('register');
});

Route::middleware('AdminMemberOnly')->group(function () {
    // create game account
    Route::get('/gameAccount/create',function(){
        return view('create_gameAccount');
        })->name('Buat Game Account');
    Route::post('/gameAccount/create', [GameAccountController::class, 'storeGameAccount'])
        ->name('Buat Game Account Logic');
    // update game account
    Route::put('/gameAccount/edit/{id}', [GameAccountController::class, 'updateGameAccount'])
        ->name('Edit Game Account');
    Route::get('/gameAccount/edit/{id}', [GameAccountController::class, 'editGameAccount'])
        ->name('Edit Game Account Page');
    // delete game account
    Route::delete('/gameAccount/delete/{id}', [GameAccountController::class, 'destroyGameAccount'])
        ->name('Delete Game Account');
    // view profile
    Route::get('/user/{id?}', [UserController::class, 'viewUser'])
        ->name('View User Profile');
    // buy game account
    Route::get('/transaksi/buat/{gameAccount}', [TransaksiController::class, 'createTransaction'])
    ->name('Buat Transaksi Page')->middleware('AdminMemberOnly');
    Route::post('/transaksi/buat', [TransaksiController::class, 'storeTransaction'])
    ->name('Buat Transaksi');
    // view Transaction
    Route::get('/transaksi_history/{id?}', [TransaksiController::class, 'indexTransaction'])
    ->name('Transaksi History Page');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'showTransaction'])
    ->name('View Transaksi History');
    // update Transaction
    Route::patch('/transaksi/edit/{id}', [TransaksiController::class, 'updateTransaction'])
    ->name('Edit Transaksi');
    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'editTransaction'])
    ->name('Edit Transaction Page');
    //Log Out
    Route::post('/auth/logout',[UserController::class,'logout'])->name('logout');
});


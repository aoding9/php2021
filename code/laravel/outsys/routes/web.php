<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
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
  return view('welcome');
});

// Route::match(['get','post'],'/test1',[TestController::class,'test1']);
Route::get('login', [TestController::class, 'test1'])->name('login');
Route::post('test1_1', [TestController::class, 'test1_1']);
Route::get('logout', [TestController::class, 'logout'])->name('logout');

Route::middleware(['auth:web','rbac'])->group(function () {
  Route::get('index', [TestController::class, 'test2'])->name('index');

  Route::name('auth.')->prefix('auth')->group(function () {
    Route::get('index', [AuthController::class, 'index'])->name('index');
    Route::get('update/{name}/{id?}', [AuthController::class, 'update'])->name('update');
    Route::any('add', [AuthController::class, 'add'])->name('add');
  });

});

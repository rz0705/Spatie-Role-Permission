<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth'])->group(function() {
    
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);

    Route::get('edit-account-info',[UserController::class,'profileInformation'])->name('admin.profile.info');
    Route::post('edit-account-info',[UserController::class,'profileInformationStore'])->name('admin.profile.info.store');
    Route::post('change-password',[UserController::class,'changePasswordStore'])->name('admin.profile.password.store');
});

require __DIR__.'/auth.php';
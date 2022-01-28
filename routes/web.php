<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PersonnelController;
use App\Http\Controllers\Admin\OderController;


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



Auth::routes();
Auth::routes(['verify' => true]);


Route::middleware('activeLoginUser')->prefix('admin')->group(function () {
    Route::get('', [Admincontroller::class, 'index'])->name('admin');
    // Route User
    Route::resource('user', UserController::class);
    Route::get('user/{user}/change_pass', [UserController::class, 'change_pass'])->name('user.change_pass');
    Route::put('user/update_pass/{user}', [UserController::class, 'update_pass'])->name('user.update_pass');
    Route::get('user/{user}/user_info', [UserController::class, 'user_info'])->name('user.user_info');
    Route::put('user/update_info/{user}', [UserController::class, 'update_info'])->name('user.update_info');
    // Role permission
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::get('/createPer', [RoleController::class, 'createPer'])->name('roles.createPer');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::post('/storePer', [RoleController::class, 'storePer'])->name('roles.storePer');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
        Route::get('/deletePer/{id}', [RoleController::class, 'deletePer'])->name('roles.deletePer');
        Route::get('/chi-tiet-chuc-vu/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::get('/chi-tiet-quyen/{id}', [RoleController::class, 'editPer'])->name('roles.editPer');
        Route::post('/sua-vai-tro/{id}', [RoleController::class, 'updateRole'])->name('roles.update');
        Route::post('/sua-quyen/{id}', [RoleController::class, 'updatePer'])->name('roles.updatePer');
        Route::get('/du-lieu', [RoleController::class, 'fetch_data'])->name('roles.fetch-data');
    });

    // Route custommer
    Route::resource('personnel', PersonnelController::class);


    // Route Oder
    Route::resource('oder', OderController::class);
    Route::get('thong-tin-thiet-ke', [OderController::class, 'oder_view'])->name('oder.view');
    Route::get('cong-viec-thiet-ke',[OderController::class, 'oder_work'])->name('oder.work');
    Route::get('Bao-cao-du-lieu-thiet-ke', [OderController::class, 'oder_analytic'])->name('oder.analytic');
    Route::get('export',[OderController::class, 'export'])->name('oder.export');

});

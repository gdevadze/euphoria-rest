<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if (Auth::check()){
        return view('dashboard');
    }
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'companies','as' => 'companies.'], function (){
        Route::get('/',[CompanyController::class,'index'])->name('index');
        Route::post('/create_render',[CompanyController::class,'createRender'])->name('create.render');
        Route::post('/companies_ajax', [CompanyController::class, 'getCompaniesForAjax'])->name('ajax');
        Route::post('/store',[CompanyController::class,'store'])->name('store');
        Route::post('/delete',[CompanyController::class,'delete'])->name('delete');
        Route::post('/edit',[CompanyController::class,'edit'])->name('edit');
        Route::post('/{id}/update',[CompanyController::class,'update'])->name('update');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [UserController::class, 'update'])->name('update');
        Route::get('/{id}/show', [UserController::class, 'show']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/create_render', [UserController::class, 'createRender'])->name('create.render');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::post('/users_ajax', [UserController::class, 'getUsersForAjax'])->name('ajax');
        Route::post('/delete_user', [UserController::class, 'deleteUser']);
        Route::get('/impersonate/{id}', function ($id) {
            $user = User::findOrFail($id);
            Auth::user()->impersonate($user);
            return redirect(url('/dashboard'));
        });
        Route::get('/impersonate_leave', function () {
            Auth::user()->leaveImpersonation();
            return redirect(url('/dashboard'));
        });
    });
});

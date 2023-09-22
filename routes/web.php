<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\SurveyController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\admin\DynamicController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DeviceModelController;

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

Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
    });

    Route::middleware(Authenticate::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->middleware(Authenticate::class)->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('edit', 'edit')->name('edit');
        Route::post('details', 'details')->name('details');
        Route::post('password', 'password')->name('password');
    });

    Route::controller(BrandController::class)->group(function () {
        Route::get('brands', 'index')->name('brands');
        Route::prefix('brand')->name('brand.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{brand}/edit', 'edit')->name('edit');
            Route::post('{brand}/edit', 'update');
            Route::get('{brand}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(DeviceModelController::class)->group(function () {
        Route::get('device_models', 'index')->name('device_models');
        Route::prefix('device_model')->name('device_model.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{device_model}/edit', 'edit')->name('edit');
            Route::post('{device_model}/edit', 'update');
            Route::get('{device_model}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('users');
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{user}/edit', 'edit')->name('edit');
            Route::post('{user}/edit', 'update');
            Route::get('{user}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('customers', 'index')->name('customers');
        Route::prefix('customer')->name('customer.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{customer}/edit', 'edit')->name('edit');
            Route::post('{customer}/edit', 'update');
            Route::get('{customer}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(SurveyController::class)->group(function () {
        Route::get('surveys', 'index')->name('surveys');
        Route::prefix('survey')->name('survey.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{survey}/edit', 'edit')->name('edit');
            Route::post('{survey}/edit', 'update');
            Route::get('{survey}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(DynamicController::class)->group(function () {
        Route::post("day/customers", 'fetch_customers')->name('day.customers');
        Route::post("brand/models", 'fetch_models')->name('brand.models');
    });
});

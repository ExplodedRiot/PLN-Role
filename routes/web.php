<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\RequestController;

use App\Http\Controllers\Technician\TechnicianDashboardController;
use App\Http\Controllers\Technician\FollowedUpRequestController;
use App\Http\Controllers\Technician\BreakTypeController;
use App\Http\Controllers\Technician\ComputerController;
use App\Http\Controllers\Technician\DepartmentController;
use App\Http\Controllers\Technician\UserController;

use App\Http\Controllers\Security\SecurityDashboardController;
use App\Http\Controllers\Technician\FollowedUpRequestController1;
use App\Http\Controllers\Technician\BreakTypeController1;
use App\Http\Controllers\Technician\ComputerController1;
use App\Http\Controllers\Technician\DepartmentController1;
use App\Http\Controllers\Technician\UserController1;

use App\Http\Controllers\Driver\DriverDashboardController;
use App\Http\Controllers\Technician\FollowedUpRequestController2;
use App\Http\Controllers\Technician\BreakTypeController2;
use App\Http\Controllers\Technician\ComputerController2;
use App\Http\Controllers\Technician\DepartmentController2;
use App\Http\Controllers\Technician\UserController2;

use App\Http\Controllers\CleaningService\CleaningServiceDashboardController;
use App\Http\Controllers\Technician\FollowedUpRequestController3;
use App\Http\Controllers\Technician\BreakTypeController3;
use App\Http\Controllers\Technician\ComputerController3;
use App\Http\Controllers\Technician\DepartmentController3;
use App\Http\Controllers\Technician\UserController3;

use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\VerifiedRequestController;
use App\Http\Controllers\Manager\TechnicianController;

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

Auth::routes(['register' => false, 'reset' => false]);

Route::prefix('/')
    ->get('/', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'which.home'])
    ->name('user.dashboard');

Route::prefix('/')
    ->middleware(['auth', 'is.user'])
    ->group(function(){
        Route::get('/request', [RequestController::class, 'index'])
        ->name('user.request');
        Route::get('/request/json', [RequestController::class, 'json'])
        ->name('user.request.json');
        Route::get('/request/create', [RequestController::class, 'create'])
        ->name('user.request.create');
        Route::get('/request/show/{id}', [RequestController::class, 'show'])
        ->name('user.request.show');
        Route::post('/request/store', [RequestController::class, 'store'])
        ->name('user.request.store');
        Route::get('/request/print/{id}', [RequestController::class, 'printPreview'])
        ->name('user.request.print');
        Route::get('/request/cancel/{id}', [RequestController::class, 'cancel'])
        ->name('user.request.cancel');
        Route::get('/request/finish/{id}', [RequestController::class, 'finish'])
        ->name('user.request.finish');
    });

Route::prefix('t')
    ->middleware(['auth', 'is.technician'])
    ->group(function(){
        Route::get('/', [TechnicianDashboardController::class, 'index'])
        ->name('technician.dashboard');
        Route::get('/json', [TechnicianDashboardController::class, 'json'])
        ->name('technician.dashboard.json');

        Route::get('/f-up-request', [FollowedUpRequestController::class, 'index'])
        ->name('technician.f-up-request');
        Route::get('/f-up-request/json', [FollowedUpRequestController::class, 'json'])
        ->name('technician.f-up-request.json');
        Route::get('/f-up-request/show/{id}', [FollowedUpRequestController::class, 'show'])
        ->name('technician.f-up-request.show');
        Route::get('/f-up-request/accept/{id}', [FollowedUpRequestController::class, 'accept'])
        ->name('technician.f-up-request.accept');
        Route::get('/f-up-request/cancel/{id}', [FollowedUpRequestController::class, 'cancel'])
        ->name('technician.f-up-request.cancel');
        Route::get('/f-up-request/finish/{id}', [FollowedUpRequestController::class, 'finish'])
        ->name('technician.f-up-request.finish');
        Route::get('/f-up-request/edit/{id}', [FollowedUpRequestController::class, 'edit'])
        ->name('technician.f-up-request.edit');
        Route::put('/f-up-request/update/{id}', [FollowedUpRequestController::class, 'update'])
        ->name('technician.f-up-request.update');

        Route::get('/computer/json', [ComputerController::class, 'json'])
        ->name('computer.json');

        Route::get('/user/json', [UserController::class, 'json'])
        ->name('user.json');

        Route::resources([
            'break-type'    => BreakTypeController::class,
            'computer'      => ComputerController::class,
            'department'    => DepartmentController::class,
            'user'          => UserController::class
        ]);
    });

    Route::prefix('d')
    ->middleware(['auth', 'is.driver'])
    ->group(function(){
        Route::get('/', [DriverDashboardController::class, 'index'])
        ->name('driver.dashboard');
        Route::get('/json', [DriverDashboardController::class, 'json'])
        ->name('driver.dashboard.json');

        Route::get('/f-up-request', [FollowedUpRequestController::class, 'index'])
        ->name('driver.f-up-request');
        Route::get('/f-up-request/json', [FollowedUpRequestController::class, 'json'])
        ->name('driver.f-up-request.json');
        Route::get('/f-up-request/show/{id}', [FollowedUpRequestController::class, 'show'])
        ->name('driver.f-up-request.show');
        Route::get('/f-up-request/accept/{id}', [FollowedUpRequestController::class, 'accept'])
        ->name('driver.f-up-request.accept');
        Route::get('/f-up-request/cancel/{id}', [FollowedUpRequestController::class, 'cancel'])
        ->name('driver.f-up-request.cancel');
        Route::get('/f-up-request/finish/{id}', [FollowedUpRequestController::class, 'finish'])
        ->name('driver.f-up-request.finish');
        Route::get('/f-up-request/edit/{id}', [FollowedUpRequestController::class, 'edit'])
        ->name('driver.f-up-request.edit');
        Route::put('/f-up-request/update/{id}', [FollowedUpRequestController::class, 'update'])
        ->name('driver.f-up-request.update');

        Route::get('/computer/json', [ComputerController::class, 'json'])
        ->name('computer.json');

        Route::get('/user/json', [UserController::class, 'json'])
        ->name('user.json');

        Route::resources([
            'break-type'    => BreakTypeController::class,
            'computer'      => ComputerController::class,
            'department'    => DepartmentController::class,
            'user'          => UserController::class
        ]);
    });

    Route::prefix('s')
    ->middleware(['auth', 'is.security'])
    ->group(function(){
        Route::get('/', [SecurityDashboardController::class, 'index'])
        ->name('security.dashboard');
        Route::get('/json', [SecurityDashboardController::class, 'json'])
        ->name('security.dashboard.json');

        Route::get('/f-up-request', [FollowedUpRequestController1::class, 'index'])
        ->name('security.f-up-request');
        Route::get('/f-up-request/json', [FollowedUpRequestController1::class, 'json'])
        ->name('security.f-up-request.json');
        Route::get('/f-up-request/show/{id}', [FollowedUpRequestController1::class, 'show'])
        ->name('security.f-up-request.show');
        Route::get('/f-up-request/accept/{id}', [FollowedUpRequestController1::class, 'accept'])
        ->name('security.f-up-request.accept');
        Route::get('/f-up-request/cancel/{id}', [FollowedUpRequestController1::class, 'cancel'])
        ->name('security.f-up-request.cancel');
        Route::get('/f-up-request/finish/{id}', [FollowedUpRequestController1::class, 'finish'])
        ->name('security.f-up-request.finish');
        Route::get('/f-up-request/edit/{id}', [FollowedUpRequestController1::class, 'edit'])
        ->name('security.f-up-request.edit');
        Route::put('/f-up-request/update/{id}', [FollowedUpRequestController1::class, 'update'])
        ->name('security.f-up-request.update');

        Route::get('/computer/json', [ComputerController1::class, 'json'])
        ->name('computer.json');

        Route::get('/user/json', [UserController1::class, 'json'])
        ->name('user.json');

        Route::resources([
            'break-type'    => BreakTypeController1::class,
            'computer'      => ComputerController1::class,
            'department'    => DepartmentController1::class,
            'user'          => UserController1::class
        ]);
    });

    Route::prefix('c')
    ->middleware(['auth', 'is.cleaningservice'])
    ->group(function(){
        Route::get('/', [CleaningServiceDashboardController::class, 'index'])
        ->name('cleaningservice.dashboard');
        Route::get('/json', [CleaningServiceDashboardController::class, 'json'])
        ->name('cleaningservice.dashboard.json');

        Route::get('/f-up-request', [FollowedUpRequestController3::class, 'index'])
        ->name('cleaningservice.f-up-request');
        Route::get('/f-up-request/json', [FollowedUpRequestController3::class, 'json'])
        ->name('cleaningservice.f-up-request.json');
        Route::get('/f-up-request/show/{id}', [FollowedUpRequestController3::class, 'show'])
        ->name('cleaningservice.f-up-request.show');
        Route::get('/f-up-request/accept/{id}', [FollowedUpRequestController3::class, 'accept'])
        ->name('cleaningservice.f-up-request.accept');
        Route::get('/f-up-request/cancel/{id}', [FollowedUpRequestController3::class, 'cancel'])
        ->name('cleaningservice.f-up-request.cancel');
        Route::get('/f-up-request/finish/{id}', [FollowedUpRequestController3::class, 'finish'])
        ->name('cleaningservice.f-up-request.finish');
        Route::get('/f-up-request/edit/{id}', [FollowedUpRequestController3::class, 'edit'])
        ->name('cleaningservice.f-up-request.edit');
        Route::put('/f-up-request/update/{id}', [FollowedUpRequestController3::class, 'update'])
        ->name('cleaningservice.f-up-request.update');

        Route::get('/computer/json', [ComputerController3::class, 'json'])
        ->name('computer.json');

        Route::get('/user/json', [UserController3::class, 'json'])
        ->name('user.json');

        Route::resources([
            'break-type'    => BreakTypeController3::class,
            'computer'      => ComputerController3::class,
            'department'    => DepartmentController3::class,
            'user'          => UserController3::class
        ]);
    });

Route::prefix('m')
    ->middleware(['auth', 'is.manager'])
    ->group(function(){
        Route::get('/', [ManagerDashboardController::class, 'index'])
        ->name('manager.dashboard');
        Route::get('/verified-request', [VerifiedRequestController::class, 'index'])
        ->name('manager.verified-request');
        Route::get('/verified-request/json', [VerifiedRequestController::class, 'json'])
        ->name('manager.verified-request.json');
        Route::put('/verified-request/verify/{id}', [VerifiedRequestController::class, 'verify'])
        ->name('manager.verified-request.verify');
        Route::get('/technician/json', [TechnicianController::class, 'json'])
        ->name('technician.json');

        Route::resources([
            'technician'    => TechnicianController::class
        ]);
    });
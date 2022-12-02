<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GroupController;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => '/groups',
    'as' => 'groups'
], function() {
    Route::get('index', [GroupController::class, 'index'])->name('index');
    Route::post('store', [GroupController::class, 'store'])->name('store');
    Route::get('show/{groupId}', [GroupController::class, 'show'])->name('show');
    Route::put('update/{groupId}', [GroupController::class, 'update'])->name('update');
    Route::delete('destroy/{groupId}', [GroupController::class, 'destroy'])->name('destroy');
    Route::group([
        'prefix' => '/clients',
        'as' => 'clients'
    ], function() {
        Route::get('by-group/{code}', [GroupController::class, 'clientsByGroup'])->name('clientsByGroup');
    });
});

Route::group([
    'prefix' => '/clients',
    'as' => 'clients'
], function() {
    Route::get('index', [ClientController::class, 'index'])->name('index');
    Route::post('store', [ClientController::class, 'store'])->name('store');
    Route::get('show/{clientId}', [ClientController::class, 'show'])->name('show');
    Route::put('update/{clientId}', [ClientController::class, 'update'])->name('update');
    Route::delete('destroy/{clientId}', [ClientController::class, 'destroy'])->name('destroy');
});

Route::post('/login', [ApiTokenController::class, 'update'])->name('login');
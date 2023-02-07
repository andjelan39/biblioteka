<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\IzdavanjeController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\KnjigaIzdavanjeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentIzdavanjeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/knjige', KnjigaController::class)->only(['show', 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    }
    );
    
    Route::resource('/users', UserController::class)->only(['show', 'index']);
    Route::resource('/studenti', StudentController::class)->only(['show', 'index']);

    Route::get('/knjige/{id}/izdavanja', [KnjigaIzdavanjeController::class, 'index'])->name('knjige.izdavanja.index');
    Route::get('/studenti/{id}/izdavanja', [StudentIzdavanjeController::class, 'index'])->name('studenti.izdavanja.index');

    Route::resource('/izdavanja', IzdavanjeController::class)->only(['show', 'index', 'update', 'store', 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
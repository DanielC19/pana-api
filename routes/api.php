<?php

use App\Http\Controllers\PearlsController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SayingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('pearl')->group(function () {

    Route::post('/daily',    [PearlsController::class, 'daily']);
    Route::post('/all',      [PearlsController::class, 'all']);
    Route::post('/create',   [PearlsController::class, 'create']);

});

Route::prefix('saying')->group(function () {

    Route::post('/random',   [SayingController::class, 'random']);
    Route::post('/all',      [SayingController::class, 'all']);
    Route::post('/create',   [SayingController::class, 'create']);

});

Route::prefix('playlist')->group(function () {

    Route::get('/user/{id}',    [PlaylistController::class, 'user']);
    Route::post('/all',         [PlaylistController::class, 'all']);
    Route::post('/create',      [PlaylistController::class, 'create']);
    Route::post('/delete',      [PlaylistController::class, 'delete']);

});

Route::prefix('profile')->group(function () {
    
    Route::post('create',               [ProfileController::class, 'create']);
    Route::post('me',                   [ProfileController::class, 'me']);
    Route::get('user/{id}',             [ProfileController::class, 'user']);
    Route::post('add/nickname',         [ProfileController::class, 'nickname']);
    Route::post('add/role',             [ProfileController::class, 'role']);
    Route::post('add/wanted',           [ProfileController::class, 'wanted']);
    Route::post('add/birth',            [ProfileController::class, 'birth']);
    Route::post('add/games',            [ProfileController::class, 'games']);
    Route::post('add/icfes',            [ProfileController::class, 'icfes']);
    Route::post('add/memorable',        [ProfileController::class, 'memorable']);
    Route::post('add/reprehensible',    [ProfileController::class, 'reprehensible']);
    Route::post('add/entry',            [ProfileController::class, 'entry']);

});
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get("/connect", [App\Http\Controllers\MainController::class, "connect"]);
Route::get("/connect/post", [App\Http\Controllers\MainController::class, "main"]);
Route::get("/connect/fetch_data/{ipaddress}", [App\Http\Controllers\MainController::class, "fetchData"]);
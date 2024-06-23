<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get("/connect", [App\Http\Controllers\MainController::class, "connect"]);
Route::get("/devices", [App\Http\Controllers\MainController::class, "devices"]);
Route::get("/edit_device/{deviceID}", [App\Http\Controllers\MainController::class, "editDevice"]);
Route::get("/connect/post", [App\Http\Controllers\MainController::class, "main"]);
Route::get("/connect/fetch_data/{IPaddress}", [App\Http\Controllers\MainController::class, "fetchData"]);

Route::post("/update_device_info/{deviceID}", [App\Http\Controllers\MainController::class, "updateDeviceInfo"]);
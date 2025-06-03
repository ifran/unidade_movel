<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get("/test", function () { return view("test"); });

Route::post("/login", [UserController::class, "makeLogin"]);
Route::get("/login", function () { return view("login"); });

Route::middleware(['login'])->group(function () {
    Route::get("/index", function () { return view("index"); });
    Route::get("/", function () { return view("index"); });

    Route::post("localization/save", [UserController::class, "saveLocalization"]);
    Route::get("localization/all", [UserController::class, "getAllOnlineLocalization"]);
});

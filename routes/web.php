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

Route::get("/index", function () { return view("index"); });
Route::get("/", function () { return view("index"); });
Route::get("localization/all", [UserController::class, "getAllOnlineLocalization"]);

Route::post("/login", [UserController::class, "makeLogin"]);
Route::get("/login", function () { return view("login"); });

Route::get("/register/type", function () { return view("register"); });
Route::get("/register/patient", function () { return view("register-patient"); });
Route::get("/register/admin", function () { return view("register-admin"); });

Route::middleware(['login'])->group(function () {
    Route::post("localization/save", [UserController::class, "saveLocalization"]);

    Route::get("unit", function () { return view("unit"); });
    Route::get("unit/form", function () { return view("unit-register"); });
});

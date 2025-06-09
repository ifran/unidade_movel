<?php

use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
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

Route::get("/index", function () {
    return view("index");
});

Route::get("/", function () {
    return view("index");
});

Route::get("localization/all", [UserController::class, "getAllOnlineLocalization"]);

Route::post("/login", [UserController::class, "makeLogin"]);

Route::get("/login", function () {
    return view("guest.login");
});

Route::get("/register/type", function () {
    return view("guest.type-choice");
});

Route::get("/register/patient", function () {
    return view("guest.patient");
});

Route::get("/register/admin", function () {
    return view("guest.admin");
});

Route::post("/admin/save", [UserController::class, "saveAdminWithCompany"]);

Route::middleware(['login'])->group(function () {
    Route::post("localization/save", [UserController::class, "saveLocalization"]);

    Route::get("unit/form", function () {
        return view("unit.form");
    });

    Route::get("unit", [UnitController::class, "index"]);
    Route::get("unit/form/{id}", [UnitController::class, "edit"]);
    Route::post("unit/save", [UnitController::class, "saveNewUnit"]);
    Route::post("unit/save/{id}", [UnitController::class, "saveEditUnit"]);

    Route::get("schedule/delete/{id}", [ScheduleController::class, "deleteSchedule"]);
    Route::post("schedule/save", [ScheduleController::class, "saveSchedule"]);

    Route::get("company", function () {
        return view("company");
    });

    Route::get("user", function () {
        return view("user.index");
    });

    Route::get("user/form", function () {
        return view("user.form");
    });

    Route::get("user/account", function () {
        return view("user.account");
    });

    Route::get("logout", function () {
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    });
});

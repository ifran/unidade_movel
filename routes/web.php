<?php

use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CompanyController;
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

Route::post("/patient/save", [UserController::class, "savePatient"]);

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
    Route::get("unit/schedule/{id}", [UnitController::class, "getAllUnitScheduleByUnitId"]);
    Route::get("unit/schedules/appointments/{id}", [UnitController::class, "getAllUnitAppointmentsByUnitId"]);
    Route::get("unit/delete/{id}", [UnitController::class, "delete"]);

    Route::post("unit/save", [UnitController::class, "saveNewUnit"]);
    Route::post("unit/save/{id}", [UnitController::class, "saveEditUnit"]);

    Route::get("schedule/delete/{id}", [ScheduleController::class, "deleteSchedule"]);
    Route::post("schedule/save", [ScheduleController::class, "saveSchedule"]);
    Route::post("schedule/appointment/save", [ScheduleController::class, "saveAppointment"]);

    Route::post("appointment/status/{appointmentId}/{statusId}", [ScheduleController::class, "saveAppointmentStatus"]);

    Route::get("company", [CompanyController::class, "index"]);
    Route::post("company/save", [CompanyController::class, "saveCompany"]);

    Route::get("user", [UserController::class, "index"]);
    Route::get("user/form/{id}", [UserController::class, "edit"]);
    Route::post("user/form/{id}", [UserController::class, "saveChanges"]);

    Route::get("user/form", function () {
        return view("user.form");
    });

    Route::post("user/form", [UserController::class, "saveUser"]);
    Route::get("user/appointment", [UserController::class, "getAllAppointmentsFromLoggedUser"]);

    Route::get("user/account", [UserController::class, "editLoggedUser"]);
    Route::post("user/account", [UserController::class, "saveUser"]);

    Route::post("user/location/share", [UserController::class, "shareLocation"]);
    Route::get("user/location/share/stop", [UserController::class, "stopSharingLocation"]);


    Route::get("logout", function () {
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    });
});

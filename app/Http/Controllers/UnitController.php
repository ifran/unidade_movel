<?php

namespace App\Http\Controllers;

use App\Services\AppointmentService;
use App\Services\UnitService;
use Illuminate\Http\Request;
use \Illuminate\View\View;

class UnitController extends Controller
{
    public function index(): View
    {
        $unitService = new UnitService();
        $units = $unitService->getAllUnitsWithScheduleFromLoggedCompany();

        return view("unit.index")
            ->with("units", $units["units"])
            ->with("schedules", $units["schedules"]);
    }

    public function saveNewUnit(Request $request)
    {
        $unitService = new UnitService();
        $unitService->saveUnitInformation($request->all());

        return redirect("/unit");
    }

    public function edit(Request $request): mixed
    {
        $unitService = new UnitService();
        $unitInformation = $unitService->getUnitInformationByUnitId($request->route("id"));

        if ($unitInformation === null) {
            return redirect("/unit");
        }

        return view("unit.form")->with("unitInformation", $unitInformation);
    }

    public function saveEditUnit(Request $request)
    {
        $unitService = new UnitService();
        $unitService->editUnitInformation($request->route("id"), $request->all());

        return redirect("/unit");
    }

    public function getAllUnitScheduleByUnitId(Request $request): View
    {
        $unitService = new UnitService();
        $schedules = $unitService->getSchedulesByUnitId($request->route("id"));
        $hours = array_values(array_unique(array_merge(...array_values($schedules["schedules"]))));

        return view("user.schedule-appointment")
            ->with("schedules", $schedules["schedules"])
            ->with("name", $schedules["name"])
            ->with("description", $schedules["description"])
            ->with("appointmentCounts", $schedules["appointmentCounts"])
            ->with("unitId", $request->route("id"))
            ->with("hours", $hours);
    }

    public function getAllUnitAppointmentsByUnitId(Request $request)
    {
        $unitId = $request->route("id");

        $appointmentService = new AppointmentService();
        return response()->json(["success" => true, "data" => $appointmentService->getAllByUnit($unitId)]);
    }

    public function delete(Request $request)
    {
        $unitService = new UnitService();
        $error = $unitService->delete($request->route("id"));

        return redirect("unit")->with("error", $error);
    }
}

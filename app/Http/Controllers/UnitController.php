<?php

namespace App\Http\Controllers;

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
            ->with("schedules", $units["schedules"])
            ;
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
}

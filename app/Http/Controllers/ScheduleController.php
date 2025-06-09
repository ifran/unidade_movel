<?php

namespace App\Http\Controllers;

use App\Services\ScheduleService;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function saveSchedule(Request $request)
    {
        $scheduleInfo = $request->all();
        $scheduleService = new ScheduleService();
        $scheduleService->saveNewSchedule($scheduleInfo);

        return redirect("/unit");
    }

    public function deleteSchedule(Request $request)
    {
        $scheduleService = new ScheduleService();
        $scheduleService->delete($request->route("id"));

        return redirect("/unit");
    }
}

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

        return redirect("/index");
    }
}

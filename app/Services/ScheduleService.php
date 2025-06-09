<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;
use Illuminate\Console\Scheduling\Schedule;

class ScheduleService
{
    public function saveNewSchedule(array $scheduleInformation)
    {
        $scheduleRepository = new ScheduleRepository();
        $scheduleRepository->saveSchedule($scheduleInformation);
    }
}

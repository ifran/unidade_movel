<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;

class ScheduleService
{
    public function saveNewSchedule(array $scheduleInformation)
    {
        $scheduleRepository = new ScheduleRepository();
        $scheduleRepository->saveSchedule($scheduleInformation);
    }

    public function delete($scheduleId)
    {
        $scheduleRepository = new ScheduleRepository();
        $scheduleRepository->delete($scheduleId);
    }
}

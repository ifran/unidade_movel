<?php

namespace App\Services;

use App\Repositories\AppointmentRepository;

class AppointmentService
{
    public function saveNewAppointment($information)
    {
        $appointmentRepository = new AppointmentRepository();
        $appointmentRepository->createAppointment($information);
    }
}

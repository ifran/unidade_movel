<?php

namespace App\Services;

use App\Models\Agendamento;
use App\Repositories\AppointmentRepository;

class AppointmentService
{
    public function saveNewAppointment($information)
    {
        $appointmentRepository = new AppointmentRepository();
        $appointmentRepository->createAppointment($information);
    }

    public function getAllByUnit($unitId): array
    {
        $appointmentRepository = new AppointmentRepository();
        $appointments = $appointmentRepository->getAllByUnit($unitId);

        $return = [];
        foreach ($appointments as $key => $appointment) {
            $return[$key]["date"] = dateToShow($appointment->data);
            $return[$key]["time"] =  $appointment->hora;
            $return[$key]["patientName"] =  $appointment->usuario_nome;
            $return[$key]["status"] = $appointment->status;
            $return[$key]["id"] = $appointment->agendamento_id;
        }

        return $return;
    }

    public function getAllFromLoggedUser()
    {
        $appointmentRepository = new AppointmentRepository();
        return $appointmentRepository->getAllByUserId(session()->get("userId"));
    }

    public function changeAppointmentStatus($appointmentId, $statusId)
    {
        $appointmentRepository = new AppointmentRepository();
        $appointmentRepository->changeStatus($appointmentId, $statusId);
    }
}

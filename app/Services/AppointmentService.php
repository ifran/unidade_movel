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
            $return[$key]["date"] =  $appointment->data;
            $return[$key]["time"] =  $appointment->hora;
            $return[$key]["patientName"] =  $appointment->usuario_nome;
            $return[$key]["status"] = $this->getAppointmentStatusNameByStatusId($appointment->status);
        }

        return $return;
    }

    private function getAppointmentStatusNameByStatusId($statusId): string
    {
        switch ($statusId) {
            case Agendamento::WAITING:
                return "Aguardando";
            default:
                return "";
        }
    }
}

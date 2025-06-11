<?php

namespace App\Repositories;

use App\Models\Agendamento;

class AppointmentRepository
{
    public function createAppointment($information)
    {
        $date = \DateTime::createFromFormat('d/m/Y', $information["scheduleDay"])->format('Y-m-d');

        $appointment = new Agendamento();
        $appointment->usuario_id = session()->get("userId");
        $appointment->unidade_id = $information["unitId"];
        $appointment->data = $date;
        $appointment->hora = $information["scheduleHour"];
        $appointment->status = Agendamento::WAITING;
        $appointment->save();
    }

    public function countAppointmentByParams($unitId, $day, $time)
    {
        return Agendamento::where("unidade_id", $unitId)
            ->where("data", $day)
            ->where("hora", $time . ":00")
            ->where("status", Agendamento::WAITING)
            ->count();
    }
}

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

    public function getAllByUnit($unitId)
    {
        return Agendamento::select(["agendamento.agendamento_id", "agendamento.data", "agendamento.hora", "usuario_nome", "agendamento.status"])
            ->join("usuario", "usuario.usuario_id", "=", "agendamento.usuario_id")
            ->where("agendamento.unidade_id", $unitId)
            ->where("status", Agendamento::WAITING)
            ->get();
    }

    public function getAllByUserId($userId)
    {
        return Agendamento::where("usuario_id", $userId)->get();
    }

    public function changeStatus($appointmentId, $statusId)
    {
        $appointment = Agendamento::find($appointmentId);
        $appointment->status = $statusId;
        $appointment->save();
    }
}

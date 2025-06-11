<?php

namespace App\Repositories;

use App\Models\Agenda;

class ScheduleRepository
{
    public function saveSchedule($scheduleInformation)
    {
        $schedule = new Agenda();
        $schedule->unidade_id = $scheduleInformation["unitId"];
        $schedule->agenda_data_ini = $scheduleInformation["data_inicial"];
        $schedule->agenda_data_fim = $scheduleInformation["data_final"];
        $schedule->agenda_hora_ini = $scheduleInformation["horario_ini"];
        $schedule->agenda_hora_fim = $scheduleInformation["horario_fim"];
        $schedule->agenda_endereco = $scheduleInformation["rua"];
        $schedule->agenda_cidade = $scheduleInformation["cidade"];
        $schedule->agenda_bairro = $scheduleInformation["bairro"];
        $schedule->agenda_estado = $scheduleInformation["estado"];
        $schedule->save();
    }

    public function getSchedulesByUnitId($unitId)
    {
        return Agenda::select([
            \DB::raw("DATE(agenda_data_ini) AS agenda_data_ini"),
            \DB::raw("DATE(agenda_data_fim) AS agenda_data_fim"),
            "agenda_hora_ini",
            "agenda_hora_fim",
            "agenda_endereco",
            "agenda_bairro",
            "agenda_cidade",
            "agenda_estado",
            "agenda_id",
        ])
            ->where("unidade_id", $unitId)
            ->get();
    }

    public function delete($scheduleId)
    {
        return Agenda::where("agenda_id", $scheduleId)->delete();
    }

    public function getAllByUnitId($unitId)
    {
        return Agenda::where("unidade_id", $unitId)->get();
    }
}

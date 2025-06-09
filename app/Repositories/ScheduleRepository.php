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
}

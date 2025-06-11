<?php

namespace App\Services;

use App\Repositories\AppointmentRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\UnitRepository;
use Illuminate\Support\Facades\Session;

class UnitService
{
    public function getAllUnitsFromLoggedCompany()
    {
        if (Session::get("companyId") !== null) {
            $unitRepository = new UnitRepository();
            return $unitRepository->getUnitsByCompany(session()->get("companyId"));
        }

        return [];
    }

    public function getAllUnitsWithScheduleFromLoggedCompany(): array
    {
        $units = $this->getAllUnitsFromLoggedCompany();

        $scheduleRepository = new ScheduleRepository();
        $scheduleReturned = [];
        foreach ($units as $unit) {
            $schedules = $scheduleRepository->getSchedulesByUnitId($unit->unidade_id);

            for ($i = 0; $i < count($schedules); $i++) {
                $schedule = $schedules[$i];
                $scheduleReturned[$unit->unidade_id][$i]["info"] =
                    "$schedule->agenda_data_ini até $schedule->agenda_data_fim
                        ($schedule->agenda_hora_ini - $schedule->agenda_hora_fim) em<br>
                        $schedule->agenda_endereco,
                        $schedule->agenda_bairro,
                        $schedule->agenda_cidade -
                        $schedule->agenda_estado";
                $scheduleReturned[$unit->unidade_id][$i]["scheduleId"] = $schedule->agenda_id;
            }
        }

        return [
            "schedules" => $scheduleReturned,
            "units" => $units
        ];
    }

    public function saveUnitInformation($unitInformation): void
    {
        $unitRepository = new UnitRepository();
        $unitRepository->saveNewUnit($unitInformation);
    }

    public function getUnitInformationByUnitId($unitId)
    {
        $unitRepository = new UnitRepository();
        return $unitRepository->getUnitInformationByUnitIdAndCompanyId($unitId, session()->get("companyId"));
    }

    public function editUnitInformation($unitId, $unitInformation): void
    {
        $unitRepository = new UnitRepository();
        $unitRepository->editInformation($unitId, $unitInformation);
    }

    public function getSchedulesByUnitId($unitId): array
    {
        $scheduleRepository = new ScheduleRepository();
        $schedules = $scheduleRepository->getAllByUnitId($unitId);

        $appointmentRepository = new AppointmentRepository();

        $appointmentCounts = [];
        $splitSchedulesByDate = [];
        foreach ($schedules as $schedule) {
            if ($schedule->agenda_data_fim >= $schedule->agenda_data_ini) {
                $agendaDataIni = new \DateTime($schedule->agenda_data_ini);
                $agendaDataFim = new \DateTime($schedule->agenda_data_fim);

                while ($agendaDataIni <= $agendaDataFim) {
                    $agendaHoraIni = new \DateTime($schedule->agenda_hora_ini);
                    $agendaHoraFim = new \DateTime($schedule->agenda_hora_fim);

                    while ($agendaHoraIni < $agendaHoraFim) {
                        $currentTime = $agendaHoraIni->format("H:i");

                        $totalByHourAndDate = $appointmentRepository->countAppointmentByParams($unitId, $agendaDataIni->format("Y-m-d"), $currentTime);

                        $splitSchedulesByDate[$agendaDataIni->format("d/m/Y")][] = $currentTime;
                        $appointmentCounts[$agendaDataIni->format("d/m/Y")][$currentTime] = $totalByHourAndDate;
                        $agendaHoraIni->modify("+30 minutes");
                    }

                    $agendaDataIni->modify("+1 day");
                }
            }
        }

        $unitRepository = new UnitRepository();
        $unitInformation = $unitRepository->getUnitInformationByUnitId($unitId);

        return [
            "name" => $unitInformation->unidade_nome,
            "description" => $unitInformation->unidade_especializacao,
            "schedules" => $splitSchedulesByDate,
            "appointmentCounts" => $appointmentCounts,
        ];
    }
}

<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;
use App\Repositories\UnitRepository;

class UnitService
{
    public function getAllUnitsWithScheduleFromLoggedCompany(): array
    {
        $unitRepository = new UnitRepository();
        $units = $unitRepository->getUnitsByCompany(session()->get("companyId"));

        $scheduleRepository = new ScheduleRepository();
        $scheduleReturned = [];
        foreach ($units as $unit) {
            $schedules = $scheduleRepository->getSchedulesByUnitId($unit->unidade_id);

            for ($i = 0; $i < count($schedules); $i++) {
                $schedule = $schedules[$i];
                $scheduleReturned[$unit->unidade_id][$i]["info"] =
                    "$schedule->agenda_data_ini até $schedule->agenda_data_fim
                        ($schedule->agenda_hora_ini - $schedule->agenda_hora_fim) em
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
}

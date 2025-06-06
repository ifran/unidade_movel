<?php

namespace App\Services;

use App\Repositories\UnitRepository;

class UnitService
{
    public function getAllUnitsFromLoggedCompany()
    {
        $unitRepository = new UnitRepository();
        return $unitRepository->getUnitsByCompany(session()->get("companyId"));
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

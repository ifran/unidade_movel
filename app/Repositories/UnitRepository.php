<?php

namespace App\Repositories;

use App\Models\Unidade;

class UnitRepository
{
    public function getUnitsByCompany(int $companyId)
    {
        return Unidade::where('empresa_id', $companyId)->get();
    }

    public function saveNewUnit($unitInformation): void
    {
        $unit = new Unidade();
        $unit->unidade_placa = $unitInformation["placa"];
        $unit->unidade_nome = $unitInformation["nome"];
        $unit->unidade_especializacao = $unitInformation["especializacao"];
        $unit->empresa_id = session()->get("companyId");
        $unit->save();
    }

    public function getUnitInformationByUnitIdAndCompanyId(int $unitId, int $companyId)
    {
        return Unidade::where("empresa_id", $companyId)
            ->where("unidade_id", $unitId)
            ->first();
    }

    public function getUnitInformationByUnitId($unitId)
    {
        return Unidade::where("unidade_id", $unitId)
            ->first();
    }

    public function editInformation($unitId, $unitInformation)
    {
        return Unidade::where("empresa_id", session()->get("companyId"))
            ->where("unidade_id", $unitId)
            ->update([
                "unidade_placa" => $unitInformation["placa"],
                "unidade_nome" => $unitInformation["nome"],
                "unidade_especializacao" => $unitInformation["especializacao"],
            ]);
    }

    public function delete($unitId)
    {
        try {
            return Unidade::where("unidade_id", $unitId)
                ->where("empresa_id", session()->get("companyId"))
                ->delete();
        } catch (\Exception $e) {
            return false;
        }
    }
}

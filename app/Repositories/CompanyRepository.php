<?php

namespace App\Repositories;

use App\Models\Empresa;

class CompanyRepository
{
    public function saveCompany($companyInformation): int
    {
        if (session()->get("companyId") !== null) {
            $company = Empresa::find(session()->get("companyId"));
        } else {
            $company = Empresa::firstOrNew([
                "empresa_cnpj" => $companyInformation["companyDocument"]
            ]);
        }

        $company->empresa_razao_social = $companyInformation["companyName"];
        $company->empresa_nome_fantasia = $companyInformation["companyNameSecondary"];
        $company->empresa_endereco = $companyInformation["address"];
        $company->save();

        return $company->empresa_id;
    }

    public function getCompanyById($companyId)
    {
        return Empresa::find($companyId);
    }
}

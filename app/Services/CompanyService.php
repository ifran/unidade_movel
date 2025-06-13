<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    public function getCompanyById($companyId)
    {
        $companyRepository = new CompanyRepository();
        return $companyRepository->getCompanyById($companyId);
    }

    public function saveCompany($companyInformation)
    {
        $companyRepository = new CompanyRepository();
        $companyRepository->saveCompany($companyInformation);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companyService = new CompanyService();
        $company = $companyService->getCompanyById(session()->get("companyId"));

        return view('company')
            ->with("company", $company);
    }

    public function saveCompany(Request $request)
    {
        $companyService = new CompanyService();
        $company = $companyService->saveCompany($request->all());

        return redirect("company");
    }
}

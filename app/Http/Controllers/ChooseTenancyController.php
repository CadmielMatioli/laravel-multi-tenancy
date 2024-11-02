<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;

class ChooseTenancyController extends Controller {

    public function __construct(private readonly CompanyService $companyService){}

    public function index(){
        session()->forget('company_uuid');
        $companies = $this->companyService->get();
        return view('pages.companies.choose-tenancy', compact('companies'));
    }

    public function store(){
        session()->put('company_uuid', $this->companyService->getByUuid()->uuid);
        return redirect()->route('dashboard');
    }
}

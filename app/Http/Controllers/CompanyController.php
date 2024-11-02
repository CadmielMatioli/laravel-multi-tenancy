<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;
use App\Services\CompanyService;

class CompanyController extends Controller {

    public function __construct(private readonly CompanyService $companyService){}

    public function create(){
        return view('pages.companies.create');
    }

    public function store(CompanyStoreRequest $request){
        $this->companyService->create($request);
        return redirect()->route('choose-tenancy.index');
    }

    public function edit(Company $company){
        return view('pages.companies.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, Company $company){
        $this->companyService->update($request, $company);
        return redirect()->route('choose-tenancy.index');
    }

    public function delete(Company $company){
        $company->delete();
        return redirect()->route('choose-tenancy.index');
    }
}

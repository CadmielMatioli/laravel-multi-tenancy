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
        try{
            $this->companyService->create($request);
            return redirect()->route('choose-tenancy.index')->with('success', 'A empresa foi criada com sucesso.');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Company $company){
        return view('pages.companies.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, Company $company){
        $this->companyService->update($request, $company);
        session()->flash('warning', 'Este é um aviso de exemplo!');

        return redirect()->route('choose-tenancy.index');
    }

    public function delete(Company $company){
        $company->delete();
        return redirect()->route('choose-tenancy.index');
    }
}

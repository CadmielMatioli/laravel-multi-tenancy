<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;

class ChooseTenancyController extends Controller {

    public function __construct(private readonly CompanyService $companyService){}

    public function index(){
        $companies = auth()->user()->companies()
            ->when(request()->filled('nome'), fn($query) => $query->where('name', 'like', '%' . request()->input('nome') . '%'))
            ->when(request()->filled('cnpj'), fn($query) => $query->where('cnpj', 'like', '%' . request()->input('cnpj') . '%'))
            ->paginate(1);
        return view('pages.choose-tenancy', compact('companies'));
    }

    public function store(){
        session()->put('company_uuid', $this->companyService->getByUuid()->uuid);
        return redirect()->route('dashboard');
    }
}

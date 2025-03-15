<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Str;

class CompanyService {

    private readonly Company $company;
    public function __construct() {
        $this->company = new Company();
    }

    public function getByUuid($uuid = null){
        return $this->company->where('uuid', $uuid ?? request()->company_uuid)->first();
    }

    public function getCurrentCompany(){
        return $this->company->where('uuid', session()->get('company_uuid'))->first();
    }

    public function get(){
        $companies = auth()->user()->companies();
        if(auth()->user()->is_admin) {
            $companies = $this->company;
        }
        return $companies
            ->when(request()->name, fn($query) => $query->where('name', 'like', '%' . request()->name . '%'))
            ->when(request()->cnpj, fn($query) => $query->where('cnpj', 'like', '%' . request()->cnpj . '%'))
            ->paginate(config('pagination.per_page'));
    }

    public function create($request){
        $existingCompany = $this->company->withTrashed()->where('cnpj', $request->cnpj)->first();
        if ($existingCompany && $existingCompany->trashed()) {
            $existingCompany->restore();
            $existingCompany->update($request->validated());
            return true;
        }

        return $this->company->create([
            'name' => $request->name,
            'uuid' => (string) Str::uuid(),
            'cnpj' => $request->cnpj
        ]);

    }

    public function update($request, $company){
        $company->update([
            'name' => $request->name,
            'uuid' => (string) Str::uuid(),
            'cnpj' => $request->cnpj
        ]);
    }
}

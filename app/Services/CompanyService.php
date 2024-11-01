<?php

namespace App\Services;

use App\Models\Company;

class CompanyService {

    public function __construct(private readonly Company $company) {}

    public function getByUuid($uuid = null){
        return $this->company->where('uuid', $uuid ?? request()->company_uuid)->first();
    }
}

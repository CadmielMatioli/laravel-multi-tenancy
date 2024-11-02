<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:255'],
            'cnpj' => ['required', 'string', 'max:255', 'unique:companies,cnpj,' . $this->company->id],
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'O nome da empresa é obrigatório',
            'cnpj.required' => 'O CNPJ da empresa é obrigatório',
        ];
    }
}

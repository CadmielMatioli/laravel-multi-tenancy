<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyStoreRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:255'],
            'cnpj' => [
                'required', 'string', 'max:255',
//                'unique:companies',
                Rule::unique('companies', 'cnpj')->where(function ($query) {
                    // Considera apenas registros que não estão deletados
                    $query->whereNull('deleted_at');
                }),
            ],
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'O nome da empresa é obrigatório',
            'cnpj.required' => 'O CNPJ da empresa é obrigatório',
        ];
    }
}

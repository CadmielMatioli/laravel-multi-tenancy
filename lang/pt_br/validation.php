<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O campo :attribute precisa ser aceito.',
    'accepted_if' => 'O campo :attribute precisa ser aceito quando :other é :value.',
    'active_url' => 'O campo :attribute precisa ser uma URL válida.',
    'after' => 'O campo :attribute precisa ser uma data depois de :date.',
    'after_or_equal' => 'O campo :attribute precisa ser uma data depois ou igual a :date.',
    'alpha' => 'O campo :attribute precisa conter apenas letras.',
    'alpha_dash' => 'O campo :attribute precisa conter apenas letras, números, traços e underlines.',
    'alpha_num' => 'O campo :attribute precisa conter apenas letras e núeros.',
    'array' => 'O campo :attribute precisa ser do tipo array.',
    'ascii' => 'O campo :attribute precisa conter apenas caracteres alfanuméricos e símbolos do tipo single-byte.',
    'before' => 'O campo :attribute precisa ser uma data antes de :date.',
    'before_or_equal' => 'O campo :attribute precisa ser uma data antes ou igual a :date.',
    'between' => [
        'array' => 'O campo :attribute precisa conter de :min até :max itens.',
        'file' => 'O campo :attribute precisa conter de :min até :max kilobytes.',
        'numeric' => 'O campo :attribute precisa ter um valor de :min até :max.',
        'string' => 'O campo :attribute precisa conter de :min até :max caracteres.',
    ],
    'boolean' => 'O campo :attribute precisa ser true ou false.',
    'can' => 'O campo :attribute um valor não autorizado.',
    'confirmed' => 'O campo :attribute de confirmação não confere.',
    'current_password' => 'Senha incorreta.',
    'date' => 'O campo :attribute precisa ser uma data válida.',
    'date_equals' => 'O campo :attribute precisa ser uma data igual a :date.',
    'date_format' => 'O campo :attribute precisa ser do formato :format.',
    'decimal' => 'O campo :attribute precisa ter um valor decimal com as seguintes casas decimais :decimal.',
    'declined' => 'O campo :attribute precisa ser recusado.',
    'declined_if' => 'O campo :attribute precisa ser recusado quando :other é :value.',
    'different' => 'O campo :attribute e :other precisam ser diferentes.',
    'digits' => 'O campo :attribute precisa conter :digits dígitos.',
    'digits_between' => 'O campo :attribute precisa conter entre :min a :max dígitos.',
    'dimensions' => 'O campo de imagem :attribute possui dimensões inválidas.',
    'distinct' => 'O campo :attribute possui valor duplicado.',
    'doesnt_end_with' => 'O valor do campo :attribute não pode ter o fim como: :values.',
    'doesnt_start_with' => 'O valor do campo :attribute não pode ter o início como: :values.',
    'email' => 'O campo :attribute precisa conter um e-mail válido.',
    'ends_with' => 'O campo :attribute precisa ter o fim como: :values.',
    'enum' => 'O valor selecionado de :attribute é inválido.',
    'exists' => 'O valor selecionado de :attribute é inválido.',
    'file' => 'O campo :attribute precisa ser um arquivo.',
    'filled' => 'O campo :attribute precisa ser preenchido.',
    'gt' => [
        'array' => 'O campo :attributeprecisa conter mais que :value itens.',
        'file' => 'O campo :attribute precisa conter mais que :value kilobytes.',
        'numeric' => 'O campo :attribute precisa ser maior que :value.',
        'string' => 'O campo :attribute precisa ter mais que :value caracteres.',
    ],
    'gte' => [
        'array' => 'O campo :attribute precisa conter :value itens ou mais.',
        'file' => 'O campo :attribute precisa precisa ter :value ou mais kilobytes.',
        'numeric' => 'O campo :attribute precisa ser maior ou igual a :value.',
        'string' => 'O campo :attribute precisa conter :value ou mais caracteres.',
    ],
    'image' => 'O campo :attribute precisa ser uma imagem.',
    'in' => 'O valor selecionado para :attribute é inválido.',
    'in_array' => 'O campo :attribute precisa estar em :other.',
    'integer' => 'O campo :attribute precisa ser do tipo integer.',
    'ip' => 'O campo :attribute precisa ser um endereço de IP válido.',
    'ipv4' => 'O campo :attribute precisa ser um endereço IPv4 válido.',
    'ipv6' => 'O campo :attribute precisa ser um endereço IPv6 válido.',
    'json' => 'O campo :attribute precisa ser um JSON válido.',
    'lowercase' => 'O campo :attribute precisa conter somente letras minúsculas.',
    'lt' => [
        'array' => 'O campo :attribute precisa ter menos que :value itens.',
        'file' => 'O campo :attribute precisa conter menos que :value kilobytes.',
        'numeric' => 'O campo :attribute precisa ser menor que :value.',
        'string' => 'O campo :attribute precisa conter menos que :value caracteres.',
    ],
    'lte' => [
        'array' => 'O campo :attribute precisa conter menos do que :value itens.',
        'file' => 'O campo :attribute precisa conter :value kilobytes ou menos.',
        'numeric' => 'O campo :attribute precisa ser menor ou igual a :value.',
        'string' => 'O campo :attribute precisa conter :value caracteres ou menos.',
    ],
    'mac_address' => 'O campo :attribute precisa ser um endereço MAC.',
    'max' => [
        'array' => 'O campo :attribute não pode conter mais que :max itens.',
        'file' => 'O campo :attribute não pode conter mais que :max kilobytes.',
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'string' => 'O campo :attribute não pode conter mais que :max caracteres.',
    ],
    'max_digits' => 'O campo :attribute não pode conter mais do que :max dígitos.',
    'mimes' => 'O campo :attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes' => 'O campo :attribute precisa ser um arquivo do tipo: :values.',
    'min' => [
        'array' => 'O campo :attribute precisa conter no mínimo :min itens.',
        'file' => 'O campo :attribute precisa conter no mínimo :min kilobytes.',
        'numeric' => 'O campo :attribute precisa ser no mínimo :min.',
        'string' => 'O campo :attribute precisa conter no mínimo :min caracteres.',
    ],
    'min_digits' => 'O campo :attribute precisa conter no mínimo :min dígitos.',
    'missing' => 'O campo :attribute não deve estar presente.',
    'missing_if' => 'O campo :attribute não deve estar presente quando :other é :value.',
    'missing_unless' => 'O campo :attribute não deve estar presente exceto se :other é :value.',
    'missing_with' => 'O campo :attribute não deve estar presente quando :values está.',
    'missing_with_all' => 'O campo :attribute não deve estar presente quando :values estão presentes.',
    'multiple_of' => 'O campo :attribute precisa ser múltiplo de :value.',
    'not_in' => 'A seleção do campo :attribute é inválida.',
    'not_regex' => 'O formato do valor de :attribute é inválido.',
    'numeric' => 'O campo :attribute precisa ser um número.',
    'password' => [
        'letters' => 'O campo :attribute precisa conter pelo menos uma letra.',
        'mixed' => 'O campo :attribute precisa conter pelo menos uma letra maiúscula e uma minúscula.',
        'numbers' => 'O campo :attribute precisa conter pelo menos um número.',
        'symbols' => 'O campo :attribute precisa conter no mínimo um símbolo.',
        'uncompromised' => 'O valor de :attribute já apareceu em um vazamento de dados. Por favor escolha um valor diferente para :attribute.',
    ],
    'present' => 'O campo :attribute precisa estar presente.',
    'prohibited' => 'O campo :attribute é proibido.',
    'prohibited_if' => 'O campo :attribute é proibido quando :other é :value.',
    'prohibited_unless' => 'O campo :attribute é proibido exceto quando :other é :values.',
    'prohibits' => 'O campo :attribute proíbe :other de estar presente.',
    'regex' => 'O formato do campo :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_array_keys' => 'O campo :attribute precisa conter valores para: :values.',
    'required_if' => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_if_accepted' => 'O campo :attribute é obrigatório quando :other está aceito.',
    'required_unless' => 'O campo :attribute é obrigatório exceto quando :other é :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando :values estão presentes.',
    'required_without' => 'O campo :attribute é obrigatório quando :values não estão presentes.',
    'required_without_all' => 'O campo :attribute é obrigatório quando um dos valores :values está presente.',
    'same' => 'O campo :attribute precisa ser igual à :other.',
    'size' => [
        'array' => 'O campo :attribute precisa conter :size itens.',
        'file' => 'O campo :attribute precisa ter um tamanho de :size kilobytes.',
        'numeric' => 'O campo :attribute precisa ser de tamanho :size.',
        'string' => 'O campo :attribute precisa conter exatamente :size caracteres.',
    ],
    'starts_with' => 'O campo :attribute precisa iniciar com um dos seguintes valores: :values.',
    'string' => 'O campo :attribute precisa ser do tipo string.',
    'timezone' => 'O campo :attribute precisa ser um timezone válido.',
    'unique' => 'O campo :attribute precisa ser único, este já foi utilizado.',
    'uploaded' => 'O campo :attribute falhou no upload.',
    'uppercase' => 'O campo :attribute precisa conter somente letras maiúsculas.',
    'url' => 'O campo :attribute precisa ser uma URL válida.',
    'ulid' => 'O campo :attribute precisa ser um ULID válido.',
    'uuid' => 'O campo :attribute precisa ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

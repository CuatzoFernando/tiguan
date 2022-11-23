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

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'alpha'                => 'El campo :attribute sólo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
    'alpha_num'            => 'El campo :attribute sólo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de :attribute no coincide.',
    'country'              => 'El campo :attribute no es un país válido.',
    'date'                 => 'El campo :attribute no corresponde con una fecha válida.',
    'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other han de ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe contener entre :min y :max dígitos.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute no corresponde con una dirección de e-mail válida.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'exists'               => 'El campo :attribute no existe.',
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute debe ser igual a alguno de estos valores :values',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección IP válida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'max'                  => [
        'numeric' => 'El campo :attribute debe ser :max como máximo.',
        'file'    => 'El archivo :attribute debe pesar :max kilobytes como máximo.',
        'string'  => 'El campo :attribute debe contener :max caracteres como máximo.',
        'array'   => 'El campo :attribute debe contener :max elementos como máximo.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe tener al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
        'array'   => 'El campo :attribute no debe contener más de :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado es invalido.',
    'numeric'              => 'El campo :attribute debe ser un numero.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ningún campo :values están presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'state'                => 'El estado no es válido para el país seleccionado.',
    'string'               => 'El campo :attribute debe contener solo caracteres.',
    'timezone'             => 'El campo :attribute debe contener una zona válida.',
    'unique'               => 'El elemento :attribute ya está en uso.',
    'url'                  => 'El formato de :attribute no corresponde con el de una URL válida.',

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

    'Matricula.required' => 'La Matricula debe tener un formato válido.',
    'Sexo.required' => '',
    'Nombre.required' => 'El Nombre es requerido.',
    'Apellidos.required' => 'Los Apellidos son requeridos.',
    'Email.required' => 'El Email debe tener un formato válido.',
    'Telefono.required' => 'El Telefono debe tener un formato válido.',
    'Seguro.required' => 'El Seguro debe tener un formato válido.',
    'Curp.required' => 'La Curp debe tener un formato válido.',
    'Edad.required' => 'Edad mayor a 18.',
    'Licenciatura.required' => 'Elige una opción.',
    'Cuatrimestre.required' => 'El Cuatrimestre debe ser mayor a 8 y menor a 10.',
    'Foto.required' => 'La Foto debe tener un formato válido.',

    'NombreT.required' => 'El nombre es requerido.',
    'ApellidosT.required' => 'Los Apellidos son requeridos.',
    'Parentesco.required' => ' ',
    'CalleT.required' => 'La Calle es requerida.',
    'NExteriorT.required' => 'El numero Exterior debe tener un formato válido.',
    'NInteriorT.required' => 'El número Interior debe tener un formato válido.',
    'ColoniaT.required' => 'La Colonia es requerida.',
    'MunicipioT.required' => 'El Municipio es requerido.',
    'EstadoT.required' => 'El Estado es requerido.',
    'TelT.required' => 'El número de Telefono debe tener un formato válido.',
    'TelCelT.required' => 'El número de Telefono debe tener un formato válido.',

    'NombrePrograma.required' => 'El Nombre del Programa es requerido.',
    'NumeroPrograma.required' => 'El Número de Programa debe tener un formato válido.',
    'FolioPrograma.required' => 'El Número de Folio debe tener un formato válido.',
    'AreaAsignacion.required' => 'El Área de Asignacion es requerida.',
    'Fecha.required' => 'La Fecha debe tener un formato válido.',

    'NombreDependencia.required' => 'El Nombre de la Dependencia es requerido.',
    'CalleD.required' => 'La Calle es requerida.',
    'NExteriorD.required' => 'El número de Exterior debe tener un formato válido.',
    'NInteriorD.required' => 'El número de Interior debe tener un formato válido.',
    'ColoniaD.required' => 'La Colonia es requerida.',
    'MunicipioD.required' => 'El Municipio es requerido.',
    'EstadoD.required' => 'El Estado es requerido.',
    'TelefonoD.required' => 'El número de Telefono debe tener un formato válido.',
    'NombreTitular.required' => 'El Nombre del Titular es requerido.',
    'NombreResponsable.required' => 'El Nombre del Responsable es requerido.',
    'Cargo.required' => 'El Cargo del Titular es requerido.',
    'Nombramiento.required' => 'A quien va dirigido el Nombramiento.',
    'NombramientoCargorequired' => 'Cargo de la persona a quien se le dirige el Nombramiento.',

    ],
    /*    
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

<?php

namespace App\Http\Requests;
use App\Documento;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'naves'     => 'required',
            'procesos'  => 'required',
            'lineas'    => 'required',
            'nombre'    => 'required|unique:documentos',
            'Excel'     => 'required'
        ];
    }
}

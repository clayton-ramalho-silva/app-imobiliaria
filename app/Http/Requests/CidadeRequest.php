<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CidadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //mudar para true para permitir qualquer usuarios
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
            'nome' => "bail|required|min:3|max:100|unique:cidades,nome,$this->cidade",
        ];
    }
}

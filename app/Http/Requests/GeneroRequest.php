<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class GeneroRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//cambiar a verdadero
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'genero'=>'required|min:3'
        ];
    }
}

<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class LoginReques extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //ponerlo en true ya que antes estaba en false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'email'=>'required|email',
            'password'=> 'required',
        ];
    }
}

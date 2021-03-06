<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MaterialesRequest extends Request
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
            'numero' => 'integer|min:2|unique:materiales|required',
            'nombre' => 'alpha|unique:materiales|required',
            'cantidad' => 'integer|min:1|required',
            'observacion' => 'min:5|max:250'
        ];
    }
}

<?php

namespace App\Http\Requests\Mapel;

use App\Http\Requests\Request;

class insertMapel extends Request
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
            'nama'  => 'required|unique:ref_mapel,nama'
        ];
    }
}

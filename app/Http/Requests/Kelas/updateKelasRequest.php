<?php

namespace App\Http\Requests\Kelas;

use App\Http\Requests\Request;

class updateKelasRequest extends Request
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
            'nama'          => 'required',
            'is_open'       => 'required',
            'ref_mapel_id'  => 'required'
        ];
    }
}

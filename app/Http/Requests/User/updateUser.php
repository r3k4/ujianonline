<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class updateUser extends Request
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
            'nama'              => 'required',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'ref_user_level_id' => 'required',
            'email'             => 'required'
        ];
    }
}

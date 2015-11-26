<?php

namespace App\Http\Requests\Quiz;

use App\Http\Requests\Request;

class createTopikQuizRequest extends Request
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
            'nama'                          => 'required',
            'is_jawaban_acak'               => 'required',
            'waktu_pengerjaan'              => 'required',
            'ref_kelas_id'                  => 'required',
            'ref_tingkat_kesulitan_soal_id' => 'required',
        ];
    }
}

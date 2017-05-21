<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioFormRequest extends FormRequest
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
            'turma_id'   => 'required',
            'seg_per_1'  => 'required',
            'seg_per_2'  => 'required',
            'seg_per_3'  => 'required',
            'seg_per_4'  => 'required',
            'ter_per_1'  => 'required',
            'ter_per_2'  => 'required',
            'ter_per_3'  => 'required',
            'ter_per_4'  => 'required',
            'quar_per_1' => 'required',
            'quar_per_2' => 'required',
            'quar_per_3' => 'required',
            'quar_per_4' => 'required',
            'quin_per_1' => 'required',
            'quin_per_2' => 'required',
            'quin_per_3' => 'required',
            'quin_per_4' => 'required',
            'sex_per_1'  => 'required',
            'sex_per_2'  => 'required',
            'sex_per_3'  => 'required',
            'sex_per_4'  => 'required',
        ];
    }
}

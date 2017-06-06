<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoFormRequest extends FormRequest
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
            'professor_id'   => 'required',
            'data_avaliacao' => 'required',
            'materia_id'     => 'required',
            'turma_id'       => 'required',
            'tipo_avaliacao' => 'required',
        ];
    }
}

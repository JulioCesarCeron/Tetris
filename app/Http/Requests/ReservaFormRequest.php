<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaFormRequest extends FormRequest
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
            'itemReserva_id'    => 'required',
            'professor_user_id' => 'required',
            'turma_id'          => 'required',
            'materia_id'        => 'required',
            'data_reserva'      => 'required',
        ];
    }
}

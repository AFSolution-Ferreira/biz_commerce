<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarsRequest extends FormRequest
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
            'name' => 'required|min:5|max:100',
            'year' => 'required|min:4|max:9',
            'price' => 'required',
            'description' => 'required|min:4|max:200',
            'image' => 'required',
            'automaker_id' => 'required',
        ];
    }

    /**
     * Configura mensagens personalizadas na view
     */
    public function messages()
    {
        return [
            'name.min' => 'Mínimo de 5 caracteres',
            'name.max' => 'Máximo de 100 caracteres',
            'name.required' => 'Preencha o campo NOME',
            'year.min' => 'Mínimo de 5 caracteres',
            'year.max' => 'Máximo de 100 caracteres',
            'year.required' => 'Preencha o campo Ano de Fabricação - (EX:2017/2018)',
            'year.required' => 'Preencha o campo Preçao do Veículo',
            'description.required' => 'Preencha o campo Descrição',
            'description.min' => 'Mínimo de 5 caracteres',
            'description.max' => 'Máximo de 100 caracteres',
            'image.required' => 'Insirá uma IMAGEM do veículo',
            'automaker_id.required' => 'Selecione uma MONTADORA',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarksRequest extends FormRequest
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
            'description' => 'required|min:5|max:100',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Mínimo de 5 caracteres',
            'name.max' => 'Máximo de 5 caracteres',
            'name.required' => 'Campo NOME Obrigatório',
            'description.min' => 'Mínimo de 5 caracteres',
            'description.max' => 'Maximo de 100 caracteres',
            'description.required' => 'Campo DESCRIÇÃO Obrigatório',
            'image.required' => 'Insirá uma LOGOMARCA Obrigatório',
        ];
    }
}

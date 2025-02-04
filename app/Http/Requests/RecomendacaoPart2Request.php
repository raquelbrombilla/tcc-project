<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class RecomendacaoPart2Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'adubo_nitrogenio' => 'nullable',
            'adubo_fosforo' => 'required|not_in:-',
            'adubo_potassio' => 'required|not_in:-',
        ];
        
    }

    public function messages(): array 
    {
        return[
            'adubo_nitrogenio' => 'Selecione o adubo de Nitrogênio!',
            'adubo_fosforo' => 'Selecione o adubo de Fósforo!',
            'adubo_potassio' => 'Selecione o adubo de Potássio!',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->sometimes('adubo_nitrogenio', 'required|not_in:-', function ($input) {
            return in_array($input->cultura, ['2', '3']);
        });
    }
}
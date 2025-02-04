<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class RecomendacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'cultura' => 'required|not_in:-',
            'expectativa_rendimento' => 'required',
            'cultivo' => 'required|not_in:-',
            'cultura_anterior' => 'nullable'
        ];
        
    }

    public function messages(): array 
    {
        return[
            'cultura' => 'A Cultura é obrigatória!',
            'expectativa_rendimento' => 'A Expetativa de Rendimento é obrigatória!',
            'cultivo' => 'O Cultivo é obrigatório!',
            'cultura_anterior' => 'A Cultura Anterior é obrigatória!',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->sometimes('cultura_anterior', 'required|not_in:-', function ($input) {
            return in_array($input->cultura, ['2', '3']);
        });
    }
}
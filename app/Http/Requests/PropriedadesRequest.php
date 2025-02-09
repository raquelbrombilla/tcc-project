<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropriedadesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
        ];
        
    }

    public function messages(): array 
    {
        return[
            'nome.required' => 'O Nome da propriedade é obrigatório!',
        ];
    }
}
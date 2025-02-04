<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnalisesSoloRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'data_analise' => 'required',
            'nome_talhao' => 'required',
            'area_ha' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
            'argila' => 'required',
            'ph' => 'required',
            'indice_smp' => 'required',
            'fosforo' => 'required',
            'potassio' => 'required',
            'materia_organica' => 'required',
            'aluminio' => 'required',
            'calcio' => 'required',
            'hidrogenio_aluminio' => 'required',
            'ctc_solo' => 'required',
        ];
        
    }

    public function messages(): array 
    {
        return[
            'data_analise.required' => 'Campo Data Análise é obrigatório!',
            'nome_talhao.required' => 'Campo Nome Talhão é obrigatório!',
            'area_ha' => 'Campo Área é obrigatório!',
            'estado' => 'Campo Estado é obrigatório!',
            'municipio' => 'Campo Município é obrigatório!',
            'argila' => 'Campo Argila é obrigatório!',
            'ph' => 'Campo PH é obrigatório!',
            'indice_smp' => 'Campo Índice SMP é obrigatório!',
            'fosforo' => 'Campo Fósforo é obrigatório!',
            'potassio' => 'Campo Potássio é obrigatório!',
            'materia_organica' => 'Campo Matéria Orgânica é obrigatório!',
            'aluminio' => 'Campo Alumínio é obrigatório!',
            'calcio' => 'Campo Cálcio é obrigatório!',
            'hidrogenio_aluminio' => 'Campo Hidrogênio + Alumínio é obrigatório!',
            'ctc_solo' => 'Campo CTC Solo é obrigatório!',
        ];
    }
}
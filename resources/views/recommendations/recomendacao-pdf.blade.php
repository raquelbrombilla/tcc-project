<div class="mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="px-6 py-4">
        <h1>Informações da Recomendação:</h1>
        <p class="text-gray-700 text-base">
            <strong>Data da Recomendação:</strong> {{ isset($data->created_at) ? \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') : '-'}}
        </p>
        <p class="text-gray-700 text-base">
            <strong>Cultura:</strong> {{ isset($data->cultura) ? $data->cultura : '-'}}
        </p>
        <p class="text-gray-700 text-base">
            <strong>Expectativa de Rendimento:</strong> {{ isset($data->expectativa_rendimento) ? $data->expectativa_rendimento." t/ha" : '-'}}
        </p>
        <p class="text-gray-700 text-base">
            <strong>Cultivo a partir da análise:</strong> {{ isset($data->cultivo) ? $data->cultivo."º" : '-'}}
        </p>
        <p class="text-gray-700 text-base">
            <strong>Cultura anterior:</strong> {{ isset($data->cultura_anterior) ? $data->cultura_anterior : '-'}}
        </p>

    </div>
</div>
<div class="grid gap-12 lg:grid-cols-1">
    <div class=" bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h2>Necessidade Total de NPK:</h2>
            <p class="text-gray-700 text-base">
                <strong>Nitrogênio (N):</strong> 
            </p>
            <p class="text-gray-700 text-base mb-4">
                <span>{{ isset($data->n) ? $data->n." kg/ha" : '-'}}</strong></span> 
            </p>

            <p class="text-gray-700 text-base">
                <strong>Fósforo (P₂O₅):</strong> 
            </p>
            <p class="text-gray-700 text-base mb-4">
                <span>{{ isset($data->p) ? $data->p." kg/ha" : '-'}}</strong></span> 
            </p>
           
            <p class="text-gray-700 text-base">
                <strong>Potássio (K₂O):</strong> 
            </p>
            <p class="text-gray-700 text-base mb-4">
                <span>{{ isset($data->k) ? $data->k." kg/ha" : '-'}}</strong></span> 
            </p>
         
        </div>
    </div>
</div>
<div class="grid gap-12 lg:grid-cols-2">
    <div class="bg-white shadow-lg rounded-lg">
        <div class="px-6 py-4 text-center">
            <h2>Adubação:</h2>
            <p class="text-gray-700 text-base">
                <strong>Nitrogênio (N):</strong> 
            </p>
            <p class="text-gray-700 text-base mb-4">
                <span>{{ isset($data->adubo_nitrogenio) ? $data->adubo_nitrogenio.':' : "-"}} <strong>{{ isset($data->qtd_nitrogenio_adub) ? $data->qtd_nitrogenio_adub." kg/ha" : ""}}</strong></span> 
            </p>
            <p class="text-gray-700 text-base">
                <strong>Fósforo (P):</strong> 
            </p>
            <p class="text-gray-700 text-base mb-4">
                <span>{{ isset($data->adubo_fosforo) ? $data->adubo_fosforo.':' : "-"}} <strong>{{ isset($data->qtd_fosforo_adub) ? $data->qtd_fosforo_adub." kg/ha" : ""}}</strong></span> 
            </p>
            <p class="text-gray-700 text-base">
                <strong>Potássio (K):</strong>
            </p>
            <p class="text-gray-700 text-base mb-4">
                <span>{{ isset($data->adubo_potassio) ? $data->adubo_potassio.':' : "-"}} <strong>{{ isset($data->qtd_potassio_adub) ? $data->qtd_potassio_adub." kg/ha" : ""}}</strong></span> 
            </p>
        </div>
    </div>
    <div class=" bg-white shadow-lg rounded-lg">
        <div class="px-6 py-4 text-center">
            <h2>Necessidade de Calagem:</h2>
            <p class="text-gray-700 text-base">
                @if (isset($data->necessidade_calagem))
                    @if ($data->necessidade_calagem == 0)
                        Não é necessário.
                    @else
                        <strong>{{$data->prnt."% PRNT: "}}</strong> {{$data->necessidade_calagem." ton/ha"}}
                    @endif
                @else
                    -
                @endif
            </p>
        </div>
    </div>
    
</div>

<div class="grid gap-12 lg:grid-cols-1">
    <p class="text-justify" style="font-size: 12px; text-align: justify">
        <strong>Aviso:</strong>
        As recomendações de adubação e calagem são geradas automaticamente pelo sistema SoloCalc, utilizando como base o Manual de Adubação e Calagem RS/SC 2016. Cada cultura e método de plantio possui suas especificidades; portanto, para garantir a precisão total dos resultados, é aconselhável consultar o manual ou um profissional técnico. Os desenvolvedores do sistema se isentam de qualquer responsabilidade técnica legal.
    </p>
</div>



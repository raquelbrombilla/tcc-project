<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>

                    <section>
                        <header>
                            <div class="bg-gradient-to-r from-green-700 to-green-900 rounded">
                                <h1 class="text-md font-medium leading-6 text-white mb-6 p-3">
                                    <a href="{{ route('analysis.index') }}" class="underline">{{ __('Análise de Solo') }}</a>
                                    <i class="bi bi-arrow-right"></i>
                                    {{ __('Informações da Recomendação:') }}
                                </h1>    
                            </div>
                        </header> 

                        @if (session('success'))
                            <div class="border-2 border-green-700 bg-white rounded">
                                <h1 class="text-md font-medium leading-6 text-green-800 p-3">
                                    {{ session('success') }}
                                </h1>    
                            </div>
                        @endif

                        @if (isset($data))
                      
                        <div class="mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Informações da Recomendação:</div>
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
                                <div class="flex justify-end">
                                    <div class="mr-3">
                                        <a href="" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                            <i class="bi bi-pencil-square"></i>
                                            <span class="ml-2">REFAZER</span>
                                        </a>    
                                    </div>
                                    <div class="mr-3">
                                        <a href="" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700">
                                            <i class="bi bi-trash"></i>
                                            <span class="ml-2">EXCLUIR</span>
                                        </a>    
                                    </div>
                                    <div>
                                        <a href="" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700">
                                            <i class="bi bi-filetype-pdf"></i>
                                            <span class="ml-2">EXPORTAR</span>
                                        </a>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid gap-12 mb-6 mt-6 lg:grid-cols-1">
                            <div class=" bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl text-center mb-2">Necessidade Total de NPK:</div>
                                    <div class="grid gap-12 mt-6 lg:grid-cols-3 text-center">
                                        <span>Nitrogênio (N) kg/ha: </span>
                                        <span>Fósforo (P₂O₅) kg/ha: </span>
                                        <span>Potássio (K₂O) kg/ha: </span>
                                    </div>
                                    <div class="grid gap-12 mt-1 mb-6 lg:grid-cols-3">
                                        <input type="number" value="{{ isset($data->n) ? $data->n : '-'}}" class="text-gray-700 text-center text-sm rounded-lg block w-full p-2.5 bg-zinc-200 border-zinc-300" placeholder="" disabled />
                                        <input type="number" value="{{ isset($data->p) ? $data->p : '-'}}" class="text-gray-700 text-center text-sm rounded-lg block w-full p-2.5 bg-zinc-200 border-zinc-300" placeholder="" disabled />
                                        <input type="number" value="{{ isset($data->k) ? $data->k : '-'}}" class="text-gray-700 text-center text-sm rounded-lg block w-full p-2.5 bg-zinc-200 border-zinc-300" placeholder="" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid gap-12 mb-6 mt-6 lg:grid-cols-2">
                            <div class="bg-white shadow-lg rounded-lg">
                                <div class="px-6 py-4 text-center">
                                    <div class="font-bold text-xl text-center mb-2">Adubação:</div>
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
                                    <div class="font-bold text-xl mb-2">Necessidade de Calagem:</div>
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
                       
                        <div class="grid gap-12 mb-6 mt-6 lg:grid-cols-1">
                            <p class="text-justify">
                                <strong>Aviso:</strong>
                                As recomendações de adubação e calagem são geradas automaticamente pelo sistema SoloCalc, utilizando como base o Manual de Adubação e Calagem RS/SC 2016. Cada cultura e método de plantio possui suas especificidades; portanto, para garantir a precisão total dos resultados, é aconselhável consultar o manual ou um profissional técnico. Os desenvolvedores do sistema se isentam de qualquer responsabilidade técnica legal.
                            </p>
                        </div>
                    
                        @endif

                    </section>
                </div>
            </div>
        </div>
     
    </div>

    <script type="text/javascript">
        $(function () {
              
            editarAnalise(teste) {
                alert('oi')
            }
        });
    </script>
</x-app-layout>

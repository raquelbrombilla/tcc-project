<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <section>
                        <header>
                            <div class="bg-gradient-to-r from-green-700 to-green-900 rounded">
                                <h1 class="text-md font-medium leading-6 text-white mb-6 p-3">
                                    <a href="{{ route('analysis.show', $data->analise_id) }}" class="underline">{{ __('Análise de Solo') }}</a>
                                    <i class="bi bi-arrow-right"></i>
                                    {{ __('Criar Recomendação:') }}

                                </h1>    
                            </div>  
                        </header>   

                        <header>
                            <h2 class="text-lg font-medium text-gray-800 mb-6">
                                <i class="bi bi-1-circle-fill"></i>
                                {{ __('Necessidade total de N, P e K (kg/ha):') }}
                            </h2>
                        </header>        

                        <div class="grid gap-6 mb-6 lg:grid-cols-3">
                            <div>
                                <label for="nitrogenio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Nitrogênio (N)</label>
                                <input type="number" value="{{ isset($data) ? $data->necessidade_nitrogenio : '-'}}" class="text-gray-700 text-sm rounded-lg block w-full p-2.5 bg-zinc-200 border-zinc-300" placeholder="" disabled />
                            </div>
                            <div>
                                <label for="fosforo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Fósforo (P₂O₅)</label>
                                <input type="number" value="{{ isset($data) ? $data->necessidade_fosforo : '-'}}" class="text-gray-700 text-sm rounded-lg block w-full p-2.5 bg-zinc-200 border-zinc-300" placeholder="" disabled />
                            </div>
                            <div>
                                <label for="potassio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Potássio (K₂O)</label>
                                <input type="number" value="{{ isset($data) ? $data->necessidade_potassio : '-'}}" class="text-gray-700 text-sm rounded-lg block w-full p-2.5 bg-zinc-200 border-zinc-300" placeholder="" disabled />
                            </div>
                        </div>    
                        
                        <header>
                            <h2 class="text-lg font-medium text-gray-800 mb-6">
                                <i class="bi bi-2-circle-fill"></i>
                                {{ __('Informações adubação e calagem:') }}
                            </h2>
                        </header>        
                        
                        <h4 class="text-sm pb-5">
                            <span style="text-decoration: underline">Observação</span>: Os critérios para calcular a calagem variam de acordo com cada cultura e o manejo do solo, conforme estabelecido pela CQFS-RS/SC (2016).
                            <br>A adubação química é calculada e é levada em consideração apenas matéria prima (Ureia, SFT, KCl, etc).
                        </h4>

                        <header>
                            <h2 class="text-lg font-medium text-gray-800 mb-6">
                                <i class="bi bi-3-circle-fill"></i>
                                {{ __('Adubos matéria prima:') }}
                            </h2>
                        </header>        
                        
                        @if (isset($edit->id))
                            <form method="post" action="{{ route('analysis.update', $edit->id) }}" id="formAnaliseSolo">
                            @method('put')
                        @else
                            <form method="post" action="{{ route('recommendations.store-part2', [$data->recomendacao_id, $data->analise_id]) }}" id="formRecomendacao">
                        @endif    
                            @csrf

                            @if ($errors->any())
                                <div class="mb-8 border-2 border-red-700 bg-white rounded">
                                    <h1 class="text-md font-medium leading-6 text-red-700 p-3">
                                        {{ $errors->all()[0] }}
                                    </h1>    
                                </div>
                            @endif

                            <input type="hidden" id="cultura" name="cultura" value="{{$data->cultura_id}}">

                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div>
                                    <label for="adubo_nitrogenio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Nitrogênio (N) {{ $data->nitrogenio > 0 ? '<span class="text-red-500">*</span>' :  ''}}</label>
                                    <select id="adubo_nitrogenio" name="adubo_nitrogenio" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300">
                                        <option value="-">Selecione uma opção</option>
                                        @foreach($adubos as $adubo)
                                            @if ($adubo->macronutriente == 'Nitrogênio')
                                                <option value="{{ $adubo->id }}">{{ $adubo->nome }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="adubo_fosforo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Fósforo (P₂O₅) <span class="text-red-500">*</span></label>
                                    <select id="adubo_fosforo" name="adubo_fosforo" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300">
                                        <option value="-">Selecione uma opção</option>
                                        @foreach($adubos as $adubo)
                                            @if ($adubo->macronutriente == 'Fósforo')
                                                <option value="{{ $adubo->id }}">{{ $adubo->nome }}</option>
                                            @endif
                                        @endforeach
                                    </select>                                
                                </div>
                                <div>
                                    <label for="adubo_potassio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Potássio (K₂O) <span class="text-red-500">*</span></label>
                                    <select id="adubo_potassio" name="adubo_potassio" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300">
                                        <option value="-">Selecione uma opção</option>
                                        @foreach($adubos as $adubo)
                                            @if ($adubo->macronutriente == 'Potássio')
                                                <option value="{{ $adubo->id }}">{{ $adubo->nome }}</option>
                                            @endif
                                        @endforeach                                   
                                    </select>     
                                </div>
                            </div>     

                            <div class="grid gap-6 mb-6 lg:grid-cols-1">
                                <div>
                                    <label for="observacao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Observações (opcional)</label>
                                    <input type="text" id="observacao" name="observacao" value="{{ old('observacao', isset($edit->observacao) ? $edit->observacao : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" required />
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div class=""></div>
                                <div class=""></div>
                                <button type="submit" onclick="confirmar(event)" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                                    <i class="bi bi-arrow-right"></i>
                                    <span class="ml-2">CRIAR RECOMENDAÇÃO</span>
                                </button>
                            </div>
                            
                        </form>
                    </section>
                </div>
            </div>
        </div>
     
    </div>
    <script type="text/javascript">              
        function confirmar(event) {
            event.preventDefault();
            Swal.fire({
                title: '',
                text: 'Deseja criar a recomendação?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#16a34a',
                cancelButtonText: 'Não',
                cancelButtonColor: '#f27474',
                focusConfirm: false,
                
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#formRecomendacao').submit();
                }
            });
        }
    </script>
</x-app-layout>

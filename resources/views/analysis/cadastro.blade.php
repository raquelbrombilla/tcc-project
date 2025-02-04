<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>

                    <section>
                        <header>
                            <div class="bg-gradient-to-r from-green-700 to-green-900 rounded">
                                <h1 class="text-md font-medium leading-6 text-white mb-6 p-3">
                                    <a href="{{ route('analysis.index') }}" class="underline">{{ __('Análises de Solo') }}</a>
                                    <i class="bi bi-arrow-right"></i>
                                    {{ isset($edit->id) ? __('Edição de Análise de Solo:') : __('Cadastro de Análise de Solo:') }}

                                </h1>    
                            </div>
                        </header>   
                        <header>
                            <h2 class="text-lg font-medium text-gray-800 mb-6">
                                <i class="bi bi-1-circle-fill"></i>
                                {{ __('Informações da análise:') }}
                            </h2>
                        </header>                        

                        @if (isset($edit->id))
                            <form method="post" action="{{ route('analysis.update', $edit->id) }}" id="formAnaliseSolo">
                            @method('put')
                        @else
                            <form method="post" action="{{ route('analysis.store') }}" id="formAnaliseSolo">
                        @endif    
                            @csrf

                            @if ($errors->any())
                                <div class="mb-8 border-2 border-red-700 bg-white rounded">
                                    <h1 class="text-md font-medium leading-6 text-red-700 p-3">
                                        {{ $errors->all()[0] }}
                                    </h1>    
                                </div>
                            @endif

                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div>
                                    <label for="data_analise" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Data da Análise <span class="text-red-500">*</span></label>
                                    <input type="date" id="data_analise" name="data_analise" value="{{ old('data_analise', isset($edit->data_analise) ? \Carbon\Carbon::parse($edit->data_analise)->format('Y-m-d') : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="dd/mm/YYYY" required />
                                </div>
                                <div>
                                    <label for="nome_talhao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Nome do Talhão</label>
                                    <input type="text" id="nome_talhao" name="nome_talhao" value="{{ old('nome_talhao', isset($edit->nome_talhao) ? $edit->nome_talhao : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" required />
                                </div>
                                <div>
                                    <label for="area_ha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Área (ha) <span class="text-red-500">*</span></label>
                                    <input type="number" id="area_ha" name="area_ha" value="{{ old('area_ha', isset($edit->area_ha) ? $edit->area_ha : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" required />
                                </div>
                                <div>
                                    <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Estado <span class="text-red-500">*</span></label>
                                    <input type="text" id="estado" name="estado" value="{{ old('estado', isset($edit->estado) ? $edit->estado : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" required />
                                </div>
                                <div>
                                    <label for="municipio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Município <span class="text-red-500">*</span></label>
                                    <input type="text" id="municipio" name="municipio" value="{{ old('municipio', isset($edit->municipio) ? $edit->municipio : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" required />
                                </div>
                                <div>
                                    <label for="propriedade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Propriedade <span class="text-red-500">*</span></label>
                                    <select id="propriedade" name="propriedade" class=" bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block p-2.5 dark:bg-white w-full dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required>
                                        <option value="-">Selecione uma opção</option>
                                        @foreach($propriedades as $prop)
                                            <option value="{{ $prop->id }}">{{ $prop->nome }}</option>
                                        @endforeach
                                    </select>                                    </div>
                            </div>     
                            
                            <header>
                                <h2 class="text-lg font-medium text-gray-800 mb-6">
                                    <i class="bi bi-2-circle-fill"></i>
                                    {{ __('Localização geográfica:') }}
                                </h2>
                            </header>

                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div>
                                    <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Latitude (graus)</label>
                                    <input type="number" id="latitude" name="latitude" value="{{ old('latitude', isset($edit->latitude) ? $edit->latitude : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="Ex: -20,123456" />
                                </div>
                                <div>
                                    <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Longitude (graus)</label>
                                    <input type="number" id="longitude" name="longitude" value="{{ old('longitude', isset($edit->longitude) ? $edit->longitude : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="Ex: -20,123456" />
                                </div>
                            </div>    

                            <header>
                                <h2 class="text-lg font-medium text-gray-800 mb-6">
                                    <i class="bi bi-3-circle-fill"></i>
                                    {{ __('Análise da camada:') }}
                                </h2>
                            </header>

                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div>
                                    <label for="argila" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Argila (%) <span class="text-red-500">*</span></label>
                                    <input type="number" id="argila" name="argila" value="{{ old('argila', isset($edit->argila) ? $edit->argila : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="ph" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">pH em Água <span class="text-red-500">*</span></label>
                                    <input type="number" id="ph" name="ph" value="{{ old('ph', isset($edit->ph) ? $edit->ph : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="indice_smp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Índice SMP <span class="text-red-500">*</span></label>
                                    <input type="number" id="indice_smp" name="indice_smp" value="{{ old('indice_smp', isset($edit->indice_smp) ? $edit->indice_smp : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="fosforo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Fósforo (P, mg/dm³) <span class="text-red-500">*</span></label>
                                    <input type="number" id="fosforo" name="fosforo" value="{{ old('fosforo', isset($edit->fosforo) ? $edit->fosforo : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="potassio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Potássio (K, mg/dm³) <span class="text-red-500">*</span></label>
                                    <input type="number" id="potassio" name="potassio" value="{{ old('potassio', isset($edit->potassio) ? $edit->potassio : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="materia_organica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Matéria Orgânica (M.O., % <span class="text-red-500">*</span>)</label>
                                    <input type="number" id="materia_organica" name="materia_organica" value="{{ old('materia_organica', isset($edit->materia_organica) ? $edit->materia_organica : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="aluminio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Alumínio (Al, cmolc/dm³) <span class="text-red-500">*</span></label>
                                    <input type="number" id="aluminio" name="aluminio" value="{{ old('aluminio', isset($edit->aluminio) ? $edit->aluminio : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="calcio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Cálcio (Ca, cmolc/dm³) <span class="text-red-500">*</span></label>
                                    <input type="number" id="calcio" name="calcio" value="{{ old('calcio', isset($edit->calcio) ? $edit->calcio : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="magnesio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Magnésio (Mg) <span class="text-red-500">*</span></label>
                                    <input type="number" id="magnesio" name="magnesio" value="{{ old('magnesio', isset($edit->magnesio) ? $edit->magnesio : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="hidrogenio_aluminio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Hidrogênio + Alumínio (H + Al, cmol/dm³) <span class="text-red-500">*</span></label>
                                    <input type="number" id="hidrogenio_aluminio" name="hidrogenio_aluminio" value="{{ old('hidrogenio_aluminio', isset($edit->hidrogenio_aluminio) ? $edit->hidrogenio_aluminio : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="ctc_solo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">CTC do solo (cmol/dm³) <span class="text-red-500">*</span></label>
                                    <input type="number" id="ctc_solo" name="ctc_solo" value="{{ old('ctc_solo', isset($edit->ctc_solo) ? $edit->ctc_solo : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="saturacao_bases" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">% SAT da CTC - BASES <span class="text-red-500">*</span></label>
                                    <input type="number" id="saturacao_bases" name="saturacao_bases" value="{{ old('saturacao_bases', isset($edit->saturacao_bases) ? $edit->saturacao_bases : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="saturacao_aluminio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">% SAT da CTC - Al  <span class="text-red-500">*</span></label>
                                    <input type="number" id="saturacao_aluminio" name="saturacao_aluminio" value="{{ old('saturacao_aluminio', isset($edit->saturacao_aluminio) ? $edit->saturacao_aluminio : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required />
                                </div>
                                <div>
                                    <label for="enxofre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Enxofre (S, mg/dm³)</label>
                                    <input type="number" id="enxofre" name="enxofre" value="{{ old('enxofre', isset($edit->enxofre) ? $edit->enxofre : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300"/>
                                </div>
                                <div>
                                    <label for="zinco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Zinco (Zn, mg/dm³)</label>
                                    <input type="number" id="zinco" name="zinco" value="{{ old('zinco', isset($edit->zinco) ? $edit->zinco : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300"/>
                                </div>
                                <div>
                                    <label for="cobre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Cobre (Cu, mg/dm³)</label>
                                    <input type="number" id="cobre" name="cobre" value="{{ old('cobre', isset($edit->cobre) ? $edit->cobre : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300"/>
                                </div>
                                <div>
                                    <label for="boro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Boro (B, mg/dm³)</label>
                                    <input type="number" id="boro" name="boro" value="{{ old('boro', isset($edit->boro) ? $edit->boro : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300"/>
                                </div>
                                <div>
                                    <label for="manganes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Manganês (Mn, mg/dm³)</label>
                                    <input type="number" id="manganes" name="manganes" value="{{ old('manganes', isset($edit->manganes) ? $edit->manganes : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300"/>
                                </div>
                                <div>
                                    <label for="ferro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Ferro (Fe, %)</label>
                                    <input type="number" id="ferro" name="ferro" value="{{ old('ferro', isset($edit->ferro) ? $edit->ferro : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300"/>
                                </div>
                            </div>    
                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div class=""></div>
                                <a href="{{ route('analysis.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                    <i class="bi bi-x-lg"></i>
                                    <span class="ml-2">CANCELAR</span>
                                    
                                </a>
                                <button type="submit" onclick="confirmar(event)" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                                    <i class="bi bi-arrow-right"></i>
                                    <span class="ml-2">SALVAR</span>
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
                    text: 'Deseja salvar os dados da Análise de Solo?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    confirmButtonColor: '#16a34a',
                    cancelButtonText: 'Não',
                    cancelButtonColor: '#f27474',
                    focusConfirm: false,
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formAnaliseSolo').submit();
                    }
                });
            }
    </script>
</x-app-layout>

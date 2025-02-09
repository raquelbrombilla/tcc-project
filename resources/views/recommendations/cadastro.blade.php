<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <section>
                        <header>
                            <div class="bg-gradient-to-r from-green-700 to-green-900 rounded">
                                <h1 class="text-md font-medium leading-6 text-white mb-6 p-3">
                                    <a href="{{ route('analysis.show', $idAnalise) }}" class="underline">{{ __('Análise de Solo') }}</a>
                                    <i class="bi bi-arrow-right"></i>
                                    {{ isset($edit->id) ? __('Edição de Análise de Solo:') : __('Criar Recomendação:') }}

                                </h1>    
                            </div>  
                        </header>   
                        <header>
                            <h2 class="text-lg font-medium text-gray-800 mb-6">
                                <i class="bi bi-1-circle-fill"></i>
                                {{ __('Informações iniciais:') }}
                            </h2>
                        </header>                        

                        @if (isset($edit->id))
                            <form method="post" action="{{ route('analysis.update', $edit->id) }}" id="formRecomendacao">
                            @method('put')
                        @else
                            <form method="post" action="{{ route('recommendations.store', $idAnalise) }}" id="formRecomendacao">
                        @endif    
                            @csrf

                            @if ($errors->any())
                                <div class="mb-8 border-2 border-red-700 bg-white rounded">
                                    <h1 class="text-md font-medium leading-6 text-red-700 p-3">
                                        {{ $errors->all()[0] }}
                                    </h1>    
                                </div>
                            @endif

                            @if (session('erros'))
                                <div class="border-2 border-red-700 bg-white rounded">
                                    <h1 class="text-md font-medium leading-6 text-red-800 p-3">
                                        {{ session('erros') }}
                                    </h1>    
                                </div>
                            @endif

                            <div class="grid gap-6 mb-6 lg:grid-cols-3">

                                <input type="hidden" id="id_analise" name="id_analise" value="{{ isset($idAnalise) ? $idAnalise : 0 }}"/>

                                <div>
                                    <label for="identificador" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Identificador</label>
                                    <input type="text" id="identificador" name="identificador" value="{{ old('identificador', isset($edit->identificador) ? $edit->identificador : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" />
                                </div>
                                <div>
                                    <label for="prnt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">% PRNT para calagem</label>
                                    <input type="number" id="prnt" name="prnt" value="{{ old('prnt', isset($edit->prnt) ? $edit->prnt : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" />
                                </div>
                              
                            </div>     
                            
                            <header>
                                <h2 class="text-lg font-medium text-gray-800 mb-6">
                                    <i class="bi bi-2-circle-fill"></i>
                                    {{ __('Informações de cultivo:') }}
                                </h2>
                            </header>

                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div>
                                    <label for="cultura" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Cultura <span class="text-red-500">*</span></label>
                                    <select id="cultura" name="cultura" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required>
                                        <option value="-">Selecione uma opção</option>
                                        @foreach($culturas as $cultura)
                                            <option value="{{ $cultura->id }}">{{ $cultura->cultura }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="esconder expectativa_rendimento">
                                    <label for="expectativa_rendimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Expectativa de rendimento (t/ha) <span class="text-red-500">*</span></label>
                                    <input type="number" id="expectativa_rendimento" name="expectativa_rendimento" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" required />
                                </div>
                                <div class="esconder sistema_cultivo">
                                    <label for="sistema_cultivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Sistema de cultivo</label>
                                    <input type="text" id="sistema_cultivo" name="sistema_cultivo" value="Plantio direto consolidado" class="text-gray-700 text-sm rounded-lg block w-full p-2.5 bg-zinc-200 border-zinc-300" placeholder="" disabled />
                                </div>
                                <div class="esconder cultivo">
                                    <label for="cultivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Cultivo a partir da análise <span class="text-red-500">*</span></label>
                                    <select id="cultivo" name="cultivo" class="bg-gray-50 border-gray-600 text-gray-600 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required>
                                        <option value="-">Selecione uma opção</option>
                                        <option value="1">1º</option>
                                        <option value="2">2º</option>
                                    </select>
                                </div>
                                <div class="esconder cultura_anterior">
                                    <label for="cultura_anterior" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Cultura anterior <span class="text-red-500">*</span></label>
                                    <select id="cultura_anterior" name="cultura_anterior" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required>
                                    </select>
                                </div>
                            </div>    
  
                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div class=""></div>
                                <a href="{{ route('analysis.show', $idAnalise) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                    <i class="bi bi-x-lg"></i>
                                    <span class="ml-2">CANCELAR</span>
                                    
                                </a>
                                <button type="submit" onclick="confirmar(event)" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-700 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                                    <i class="bi bi-arrow-right"></i>
                                    <span class="ml-2">CONTINUAR</span>
                                </button>
                            </div>
                            
                        </form>
                    </section>
                </div>
            </div>
        </div>
     
    </div>
    <script type="text/javascript">              
        $(function () {
            if ($('#cultura').val() == '-') {
                $('.esconder').addClass("hidden");
            }

            $('#cultura').change(function() {
                $('.esconder').addClass("hidden");
                var cultura_anterior = $("#cultura_anterior");
                cultura_anterior.empty();
                cultura_anterior.append('<option value="-">Selecione uma opção</option>');
                
                if (this.value == "1") {
                    $('.expectativa_rendimento').removeClass("hidden");
                    $('.sistema_cultivo').removeClass("hidden");
                    $('.cultivo').removeClass("hidden");
                }

                if (this.value == "2" || this.value == "3") {
                    $('.expectativa_rendimento').removeClass("hidden");
                    $('.sistema_cultivo').removeClass("hidden");
                    $('.cultivo').removeClass("hidden");
                    $('.cultura_anterior').removeClass("hidden");

                    cultura_anterior.append('<option value="Leguminosa">Leguminosa</option>');
                    cultura_anterior.append('<option value="Gramínea">Gramínea</option>');

                    if (this.value == 2) {
                        cultura_anterior.append('<option value="Pousio">Consorciação ou Pousio</option>');

                    }
                }
            })
        });

        function confirmar(event) {
            event.preventDefault();
            Swal.fire({
                title: '',
                text: 'Deseja prosseguir com a recomendação?',
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

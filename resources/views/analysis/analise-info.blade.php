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
                                    <a href="{{ route('analysis.create') }}" class="underline">{{ __('Cadastro de Análise de Solo:') }}</a>
                                    <i class="bi bi-arrow-right"></i>
                                    {{ __('Informações da Análise de Solo:') }}
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
                                <div class="font-bold text-xl mb-2">Análise de Solo</div>
                                <p class="text-gray-700 text-base">
                                    <strong>Responsável Técnico:</strong> {{$data->name}}
                                </p>
                                <p class="text-gray-700 text-base">
                                    <strong>Data da Análise:</strong> {{ \Carbon\Carbon::parse($data->data_analise)->format('d/m/Y') }}
                                </p>
                                <p class="text-gray-700 text-base">
                                    <strong>Localização:</strong> {{$data->municipio}} - {{$data->estado}}
                                </p>
                                <p class="text-gray-700 text-base">
                                    <strong>Propriedade:</strong> {{$data->propriedade}}
                                </p>
                                <p class="text-gray-700 text-base">
                                    <strong>Área (ha):</strong> {{$data->area_ha}}
                                </p>

                                <div class="flex justify-end">
                                    <div class="mr-3">
                                        <a href="{{ route('analysis.edit', $data->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                            <i class="bi bi-pencil-square"></i>
                                            <span class="ml-2">EDITAR</span>
                                            
                                        </a>    
                                    </div>
                                    <div class="">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                                            <i class="bi bi-trash"></i>
                                            <span class="ml-2">EXCLUIR</span>
                                        </button>    
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="grid gap-12 mb-6 mt-6 lg:grid-cols-2">
                            <div class="flex justify-end">
                                <button id="btnToggleDiv" class="inline-flex items-center justify-center py-7 px-6 h-12 text-md border border-green-600 shadow-lg font-bold rounded-lg text-white bg-gradient-to-r from-green-700 to-green-900 hover:from-green-600 hover:to-green-800 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-green-500 transform hover:scale-105 transition-transform duration-300 ease-in-out w-80">
                                    <i class="bi bi-eye w-6 h-6 mr-1" id="iconVer"></i>
                                    <i class="bi bi-eye-slash w-6 h-6 mr-1" id="iconNaoVer"></i>
                                    
                                </button>    
                            </div>

                            <div class="flex justify-start">
                                <a href="{{ route('recommendations.create', $data->id) }}" class="inline-flex items-center justify-center py-7 px-6 h-12 text-md border border-green-600 shadow-lg font-bold rounded-lg text-white bg-gradient-to-r from-green-700 to-green-900 hover:from-green-600 hover:to-green-800 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-green-500 transform hover:scale-105 transition-transform duration-300 ease-in-out w-80">
                                    <i class="bi bi-plus-circle w-6 h-6 mr-1"></i>
                                    CRIAR RECOMENDAÇÕES
                                </a>    
                            </div>
                            
                        </div> 
                        <div class="grid gap-12 mb-6 mt-6 lg:grid-cols-2" id="divRecomendacao">
                            @if (isset($recomendacoes))
                                @foreach ($recomendacoes as $r)
                                    <a href="{{ route('recommendations.show', $r->id) }}" target="_blank" class="bg-white shadow-lg rounded-lg">
                                        <div class="px-6 py-4">
                                            <div class="font-bold text-xl mb-2">Recomendação</div>
                                            @if (!empty($r->identificador))
                                                <p class="text-gray-700 text-base">
                                                    <strong>Identificador:</strong> {{$r->identificador}}
                                                </p>
                                            @endif
                                            <p class="text-gray-700 text-base">
                                                <strong>Data:</strong> {{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}
                                            </p>
                                            <p class="text-gray-700 text-base">
                                                <strong>Cultura:</strong> {{$r->cultura}}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        @endif

                    </section>
                </div>
            </div>
        </div>
     
    </div>

    <script type="text/javascript">
        $(function () {
            $('#divRecomendacao').addClass("hidden");
            $('#iconNaoVer').addClass("hidden");
            $("#btnToggleDiv").append('VER RECOMENDAÇÕES')

            $("#btnToggleDiv").click(function(){
                if ($("#divRecomendacao").hasClass("hidden")) {
                    $("#divRecomendacao").removeClass("hidden").fadeIn("slow");
                    $('#iconNaoVer').removeClass("hidden");
                    $('#iconVer').addClass("hidden");
                } else {
                    $("#divRecomendacao").fadeOut("slow", function(){
                        $(this).addClass("hidden");
                    });

                    $('#iconNaoVer').addClass("hidden");
                    $('#iconVer').removeClass("hidden");
                }
            });
        });

    </script>
</x-app-layout>

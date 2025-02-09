<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <section>
                        <header>
                            <div class="bg-gradient-to-r from-green-700 to-green-900 rounded">
                                <h1 class="text-md font-medium leading-6 text-white mb-6 p-3">
                                    <a href="{{ route('propriedades.index') }}" class="underline">{{ __('Propriedades') }}</a>
                                    <i class="bi bi-arrow-right"></i>
                                    {{ isset($edit->id) ? __('Edição de Propriedade:') : __('Cadastrar Propriedade:') }}

                                </h1>    
                            </div>  
                        </header>   
                        <header>
                            <h2 class="text-lg font-medium text-gray-800 mb-6">
                                <i class="bi bi-1-circle-fill"></i>
                                {{ __('Informações da propriedade:') }}
                            </h2>
                        </header>                        
                        @if (isset($edit->id))
                            <form method="post" action="{{ route('propriedades.update', $edit->id) }}" id="formPropriedade">
                            @method('put')
                        @else
                            <form method="post" action="{{ route('propriedades.store') }}" id="formPropriedade">
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

                                <div>
                                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Nome <span class="text-red-500">*</span></label>
                                    <input type="text" id="nome" name="nome" value="{{ old('nome', isset($edit->nome) ? $edit->nome : '') }}" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" placeholder="" />
                                </div>                              
                            </div>     
                            
  
                            <div class="grid gap-6 mb-6 lg:grid-cols-3">
                                <div class=""></div>
                                <a href="{{ route('propriedades.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
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
                text: 'Deseja salvar os dados da Propriedade?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#16a34a',
                cancelButtonText: 'Não',
                cancelButtonColor: '#f27474',
                focusConfirm: false,
                
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#formPropriedade').submit();
                }
            });
        }
    </script>
</x-app-layout>

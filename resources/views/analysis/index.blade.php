<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="grid gap-6 mb-6 lg:grid-cols-2 mr-8 ml-8 mt-5">

                    <h1 class="text-xl font-medium text-gray-800 mt-8">
                        {{ __('Análises de Solo:') }}
                    </h1> 
                    <div class="flex m-6 justify-end">
                        <a href="{{ route('analysis.create') }}" class="inline-flex items-center justify-center py-7 px-6 h-12 text-md border border-green-700 shadow-lg font-bold rounded-lg text-white bg-gradient-to-r from-green-700 to-green-900 hover:from-green-600 hover:to-green-800 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-green-800 transform hover:scale-105 transition-transform duration-300 ease-in-out">
                            <i class="bi bi-plus-circle w-6 h-6 mr-1"></i>
                            NOVA ANÁLISE DE SOLO
                        </a>
                    </div>   
                </div>

                @if (session('success'))
                    <div class="mr-8 ml-8 border-2 border-green-700 bg-white rounded">
                        <h1 class="text-md font-medium leading-6 text-green-800 p-3">
                            {{ session('success') }}
                        </h1>    
                    </div>
                @endif

                <div class="mr-8 ml-8 mb-10">
                    <table id="tableAnalises" class="overflow-hidden stripe hover rounded-xl border" style="width:100%">
                        <thead class="bg-green-800">
                            <tr>
                                <th class="text-sm font-medium leading-5 text-white">#</th>
                                <th class="text-sm font-medium leading-5 text-white">Data</th>
                                <th class="text-sm font-medium leading-5 text-white">Nome Talhão</th>
                                <th class="text-sm font-medium leading-5 text-white">Cidade</th>
                                <th class="text-sm font-medium leading-5 text-white">Propriedade</th>
                                <th class="text-sm font-medium leading-5 text-white">Recomendações</th>
                                <th class="text-sm font-medium leading-5 text-white">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

    
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
              
            var table = $('#tableAnalises').DataTable({
                language: { 
                    url : "/assets/language.json",
                },
                processing: true,
                info: false,
                searching: false,
                pagingType: 'simple_numbers', 
                initComplete: function() { 
                    $('.dt-paging-button .current').addClass('rounded-full bg-blue-500 text-white px-3 py-1 mx-1');
                },
                ajax: "{{ route('analysis.index') }}",
                columns: [
                    {data: 'id', name: 'id', width: '10%', className: 'dt-center'},
                    {data: 'data_analise', render : function(data) {
                        return `
                            ${data}
                        `;
                    }, width: '10%', className: 'dt-center'},
                    {data: 'nome_talhao', data: 'nome_talhao',  width: '20%', className: 'dt-center'},
                    {data: 'municipio', name: 'municipio',  width: '25%', className: 'dt-center'},
                    {data: 'propriedade', name: 'propriedade',  width: '20%', className: 'dt-center'},
                    {data: 'qtd_recomendacao', render : function(data) {
                        return data;
                    }, width: '10%', className: 'dt-center'},
                    {data: 'action', width: '10%', className: 'dt-center'},
                ]
            });
            
        });
      </script>
</x-app-layout>

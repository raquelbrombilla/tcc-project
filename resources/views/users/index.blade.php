<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="grid gap-6 mb-6 lg:grid-cols-2 mr-8 ml-8 mt-5">

                    <h1 class="text-xl font-medium text-gray-800 mt-8">
                        {{ __('Usuários:') }}
                    </h1> 
                </div>

                @if (session('success'))
                    <div class="mr-8 ml-8 border-2 border-green-700 bg-white rounded">
                        <h1 class="text-md font-medium leading-6 text-green-800 p-3">
                            {{ session('success') }}
                        </h1>    
                    </div>
                @endif

                @if (session('warning'))
                    <div class="mr-8 ml-8 border-2 border-yellow-500 bg-white rounded">
                        <h1 class="text-md font-medium leading-6 text-yellow-500 p-3">
                            {{ session('warning') }}
                        </h1>    
                    </div>
                @endif

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


                <div class="mr-8 ml-8 mb-10">
                    <table id="tableUsers" class="overflow-hidden stripe hover rounded-xl border" style="width:100%">
                        <thead class="bg-green-800">
                            <tr>
                                <th class="text-sm font-medium leading-5 text-white">#</th>
                                <th class="text-sm font-medium leading-5 text-white">Nome</th>
                                <th class="text-sm font-medium leading-5 text-white">E-mail</th>
                                <th class="text-sm font-medium leading-5 text-white">Ativo</th>
                                <th class="text-sm font-medium leading-5 text-white">Usuário</th>
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
              
            var table = $('#tableUsers').DataTable({
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
                ajax: "{{ route('users.index') }}",
                columns: [
                    {data: 'id', name: 'id', width: '10%', className: 'dt-center'},
                    {data: 'name', data: 'name',  width: '35%', },
                    {data: 'email', data: 'email',  width: '35%', },
                    {data: 'active', render : function(data) {
                        if (data == 0) {
                            return 'Inativo';
                        } else {
                            return 'Ativo';
                        }
                    }, width: '10%', className: 'dt-center'},
                    {data: 'admin', render : function(data) {
                        if (data == 0) {
                            return 'Normal';
                        } else {
                            return 'Administrador';
                        }
                    }, width: '10%', className: 'dt-center'},
                    {data: 'action', width: '20%', className: 'dt-center'},
                ]
            });
            
            $('#tableUsers').on('click', '.btn-inativar', function() {
                event.preventDefault();

                var button = $(this);
                var form = button.closest('form');

                Swal.fire({
                    title: '',
                    text: 'Deseja inativar o usuário?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    confirmButtonColor: '#16a34a',
                    cancelButtonText: 'Não',
                    cancelButtonColor: '#f27474',
                    focusConfirm: false,
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $('#tableUsers').on('click', '.btn-ativar', function() {
                event.preventDefault();

                var button = $(this);
                var form = button.closest('form');

                Swal.fire({
                    title: '',
                    text: 'Deseja ativar o usuário?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    confirmButtonColor: '#16a34a',
                    cancelButtonText: 'Não',
                    cancelButtonColor: '#f27474',
                    focusConfirm: false,
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $('#tableUsers').on('click', '.btn-tornar-admin', function() {
                event.preventDefault();

                var button = $(this);
                var form = button.closest('form');

                Swal.fire({
                    title: '',
                    text: 'Deseja tornar este usuário administrador?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    confirmButtonColor: '#16a34a',
                    cancelButtonText: 'Não',
                    cancelButtonColor: '#f27474',
                    focusConfirm: false,
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $('#tableUsers').on('click', '.btn-revogar-admin', function() {
                event.preventDefault();

                var button = $(this);
                var form = button.closest('form');

                Swal.fire({
                    title: '',
                    text: 'Deseja revogar o acesso de administrador deste usuário?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    confirmButtonColor: '#16a34a',
                    cancelButtonText: 'Não',
                    cancelButtonColor: '#f27474',
                    focusConfirm: false,
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

        });
      </script>
</x-app-layout>

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              
                <div class="grid gap-6 mb-6 lg:grid-cols-3 mt-5">
                    <div class="">
                        <h1 class="text-xl font-medium text-gray-800">
                            {{ __('Dashboards por Propriedade:') }}
                        </h1>     
                    </div>
                    <div></div>
                    <div>
                        <select id="propriedade" name="propriedade" class=" bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block p-2.5 dark:bg-white w-full dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-300" required>
                            @foreach($propriedades as $prop)
                                <option value="{{ $prop->id }}">{{ $prop->nome }}</option>
                            @endforeach
                        </select>    
                    </div>   
                </div>
                <div class="grid gap-6 mb-6 lg:grid-cols-1">
                    <h1 class="text-xl font-medium text-gray-800 text-center mt-8">
                        {{ __('Localização geográfica das análises de solo:') }}
                    </h1> 
                    <span id="mapa" class="text-center"></span>
                    <div id="map" class="h-80"></div>  
                </div>
                <div class="grid gap-6 mb-6 lg:grid-cols-3">
                    <div></div>
                    <div>
                        <h1 class="text-xl font-medium text-gray-800 text-center pb-6 mt-8">
                            {{ __('Recomendações por Cultura:') }}
                        </h1> 
                        <p id="grafico" class="text-center"></p>
                        <canvas id="myChart" class="h-12"></canvas>
                    </div> 
                </div>
            </div>
        </div>

      
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=visualization"></script>


    <script type="text/javascript">
        $(function () {
            $('#propriedade').change(function() {
                let propriedade_id = this.value;

                $.ajax({
                    url: "{{ route('dashboard.info') }}",
                    type: 'GET',
                    data: {
                        propriedade: propriedade_id,
                    },
                    success: function(response) {
                        if (response.pontos.length > 0) {
                            $('#map').show();
                            $('#mapa').text("")
                            google.maps.event.addDomListener(window, 'load', initMap(response.pontos));
                        } else {
                            $('#mapa').text("Sem informações.")
                            $('#map').hide();
                        }

                        if (response.analises.length > 0) {
                            $('#grafico').text("")
                            $('#myChart').show();

                            const data = {
                                labels: [
                                    'Soja',
                                    'Milho',
                                    'Trigo',
                                ],
                                datasets: [{
                                    label: 'Recomendações',
                                    data: response.analises.map(data => data.cont),
                                    backgroundColor: [
                                        'rgb(0, 0, 116)',
                                        'rgb(20, 83, 55)',
                                        'rgb(255, 205, 86)',
                                    ],
                                    hoverOffset: 3,
                                }],
                            };

                            const config = {
                                type: 'pie',
                                data: data,
                            };
                            const myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                            );

                        } else {
                            $('#grafico').text("Sem informações.")
                            $('#myChart').hide();
                        }
                    },
                    error: function(xhr) {
                        console.error('Erro ao obter dados do servidor:', xhr);
                    }
                });
            });

            $('#propriedade').trigger('change');
        });
     
        let map, heatmap;

        function initMap(pontos) {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: { lat: pontos[0]['lat'], lng: pontos[0]['lon'] }, // Coordenadas para centralizar o mapa
                mapTypeId: 'satellite'
            });

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: getPoints(pontos),
                map: map
            });
        }

        function getPoints(pontos) {

            return $.map(pontos, function(item) {
                return new google.maps.LatLng(item.lat, item.lon);
            });
        }
      
    </script>
 
</x-app-layout>

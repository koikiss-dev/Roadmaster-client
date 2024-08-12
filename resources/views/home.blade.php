@extends('layout.app')

@section('subtitle', 'Welcome')

@section('content_body')
    <section class="mt-3">
        <div class="row">

            @foreach ($info['InfoBoxs'] as $i)
                <div class="col">
                    <x-adminlte-info-box id="{{ $i['label'] }}" title="{{ $i['label'] }}" text="{{ $i['value'] }}"
                        icon="{{ $i['icon'] }}" theme="dark" icon-theme="{{ $i['icon_theme'] }}" />

                </div>
            @endforeach
            {{-- {{ json_encode($info['months']) }} --}}
        </div>
    </section>
    {{-- grafico de barras para tener info de vehiculos filtrados por marcas y modelos --}}
    <section class="row">
        <div class="col col-lg-6">
            <div class="info-box">
                <canvas id="chartVehiclesPerModelAndMarca"></canvas>
            </div>
        </div>

        <div class="col col-lg-6">
            <div class="info-box">
                <canvas id="chartSales"></canvas>
            </div>
        </div>
    </section>



@stop

@push('js')
    <script>
        /* define html canvas reference to chartjs */
        const chartVehicleMMCanvas = document.getElementById('chartVehiclesPerModelAndMarca');
        const chartSalesCanvas = document.getElementById('chartSales');


        const chartVehicleMMConfig = {
            type: 'pie',
            data: {
                labels: @json($info['brands']),
                datasets: [{
                    label: 'Distribución de marcas',
                    data: @json($info['ChartVehicleData']),
                    backgroundColor: [
                        'rgba(255, 95, 132)',
                        'rgba(255, 159, 64)',
                        'rgba(255, 205, 86)',
                        'rgba(75, 192, 192)',
                    ],
                    borderWidth: '0px',
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true
            }
        };


        const dataLines = {
            labels: @json($info['months']),
            datasets: [{
                label: "Cantidad vendida por mes",
                data: @json($info['monthSalesCant']),
                fill: false,
                borderColor: 'rgb(75,192,192)',
                tension: 0.1
            }]
        };
        const chartSlesConfig = {
            type: 'line',
            data: dataLines
        };


        $(document).ready(() => {
            new Chart(chartVehicleMMCanvas, chartVehicleMMConfig);
            new Chart(chartSalesCanvas, chartSlesConfig);
        })
    </script>
@endpush

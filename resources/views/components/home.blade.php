@extends('layout.app')

@section('subtitle', 'Welcome')

@section('content_body')
    <section class="mt-3">
        <div class="row">
            @foreach ($info as $i)
                <div class="col">
                    <x-adminlte-info-box id="{{ $i['label'] }}" title="{{ $i['label'] }}" text="{{ $i['value'] }}"
                        icon="{{ $i['icon'] }}" theme="dark" icon-theme="{{ $i['icon_theme'] }}" />

                </div>
            @endforeach
        </div>
    </section>
    {{-- grafico de barras para tener info de vehiculos filtrados por marcas y modelos --}}
    <section class="row">

        <div class="col col-xl-6 ">
            <canvas id="chartVehiclesPerModelAndMarca"></canvas>
        </div>
        <div class="col col-xl-6">
            <canvas id="chartSales"></canvas>
        </div>
    </section>



@stop

@push('js')
    <script>
        /* define html canvas reference to chartjs */
        const chartVehicleMMCanvas = document.getElementById('chartVehiclesPerModelAndMarca');
        const chartSalesCanvas = document.getElementById('chartSales');


        const chartVehicleMMConfig = {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const MONTHS = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        const dataLines = {
            labels: MONTHS,
            datasets: [{
                label: "nose",
                data: [65, 564, 897, 23, 1, 5, 65, 564, 897, 23, 1, 5],
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

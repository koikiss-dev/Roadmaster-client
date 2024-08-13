@extends('layout.app')

@section('subtitle', 'Vehiculos')

@section('content_body')
    <h1>Vehiculos</h1>

    {{-- {{ json_encode($info['test']) }} --}}
    <x-adminlte-datatable id="table" :heads="$info['headsTable']">
        @foreach ($info['config']['data'] as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{!! $cell !!} </td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop

@push('js')
    <script></script>
@endpush

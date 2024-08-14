@extends('layout.app')


@section('subtitle', 'Vehiculos')

@section('content_body')
    <h1>Vehiculos</h1>


    <x-adminlte-datatable id="table" :heads="$info['headsTable']" with-buttons>
        @foreach ($info['config']['data'] as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{!! $cell !!} </td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>
    <x-adminlte-modal id="modalMin" title="Minimal">
        <span id="idField"></span>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}

@stop

{{-- @push('js')
    <script>
        const table = new DataTable("table");
        $(document).ready(() => {

            table.on('click', 'tbody tr', () => {
                const data = table.row(this).data();

                console.log(data[0])
            })
        })
    </script>
@endpush --}}
@section('js')
    <script>
        $(document).on('click', '#showInfo', function() {
            var id = $(this).data('id');
            $('#modalMin #idField').text(id);

            //document.getElementById('idField').textContent = id;

            console.log(id)
        });
    </script>
@stop

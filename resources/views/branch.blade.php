@extends('layout.app')

@section('subtitle', 'Sucursales')

@section('content_body')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Sucursales</h1>
        <x-adminlte-button label="Agregar una Sucursal" theme="primary" data-toggle="modal" data-target="#insert" />
    </header>

    <section>
        <x-adminlte-datatable striped id="table" :heads="$info['headsTable']" :config="$info['config']" with-buttons>
            @foreach ($info['config']['data'] as $row)
                <tr>
                    @foreach ($row as $cell)
                        <td>{!! $cell !!} </td>
                    @endforeach
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </section>

    {{-- este es el modal para ver la informacion de x registro, cambiar solo title y los campos a mostrar --}}
    <x-adminlte-modal onclick="" id="view" size="lg" title="Información de Sucursal">
        <div class="form-group">
            <label for="nomSucursal">Nombre del Sucursal</label>
            <p id="nomSucursal"></p>
        </div>

        <div class="form-group">
            <label for="codSucursal">codigo Sucursal</label>
            <p id="codSucursal"></p>
         <div class="form-group">

            <label for="codGerente">codigo Gerente</label>
            <p id="codGerente"></p>

            <div class="form-group">
            <label for="codubicacion">codigo Ubicacion</label>
            <p id="codubicacion"></p>

        </div>
    </x-adminlte-modal>


    {{-- este es el modal para insertar un registro, cambiar solo title y los campos a mostrar --}}
    <x-adminlte-modal onclick="" id="insert" size="lg" title="Insertar un nuevo Vehiculo">
        <form id="insertForm">
            <div class="row">

                <x-adminlte-input name="PI_COD_SUCURSAL" label="Codigo de la Sucursal"
                    placeholder="Ingresa el Codigo de la Sucursal" fgroup-class="col-md-6" />

                <x-adminlte-input name="PV_NOM_SUCURSAL" label="Nombre de la Sucursal"
                    placeholder="Ingresa el Nombre de la Sucursal" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_COD_GERENTE" label="Codigo de Gerente"
                    placeholder="Ingresa el Codigo del Gerente" fgroup-class="col-md-6" />

                    <x-adminlte-input name="PI_COD_UBICACIONES" label="Codigo de Ubicaciones"
                    placeholder="Ingresa el codigo de la ubicacion" fgroup-class="col-md-6" value="1" />


            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
    </x-adminlte-modal>


    {{-- este es el modal para editar un registro, cambiar solo title y los campos a mostrar --}}
    <x-adminlte-modal onclick="" id="edit" size="lg" title="Modifica un vehiculo">
        <form id="updateForm">

            <div class="row">

            <x-adminlte-input name="PI_COD_SUCURSAL" label="Codigo de la Sucursal"
                    placeholder="Ingresa el Codigo de la Sucursal" fgroup-class="col-md-6" />

                <x-adminlte-input name="PV_NOM_SUCURSAL" label="Nombre de la Sucursal"
                    placeholder="Ingresa el Nombre de la Sucursal" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_COD_GERENTE" label="Codigo de Gerente"
                    placeholder="Ingresa el Codigo del Gerente" fgroup-class="col-md-6" />

                    <x-adminlte-input name="PI_COD_UBICACIONES" label="Codigo de Ubicaciones"
                    placeholder="Ingresa el codigo de la ubicacion" fgroup-class="col-md-6" value="1" />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save" />
        </form>

        <span id="idField"></span>
    </x-adminlte-modal>


@stop

@section('js')
    <script>


        //update vehicle data
        document.getElementById("updateForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const data = {

                PV_NOM_SUCURSAL: document.querySelector("[name='PV_NOM_SUCURSAL']").value,
                PI_COD_GERENTE: document.querySelector("[name='PI_COD_GERENTE']").value,
                PI_COD_UBICACIONES: document.querySelector("[name='PI_COD_UBICACIONES']").value,
                PI_COD_SUCURSAL: document.querySelector("[name='PI_COD_SUCURSAL']").value,
            };


            fetch(`https://road-master-server.vercel.app/vehiculo/`, {
                    method: "PATCH",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Success:", data);
                    location.reload();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        });


        //insert vehicle
        document.getElementById("insertForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const data = {
                PV_NOM_SUCURSAL: document.querySelector("[name='PV_NOM_SUCURSAL']").value,
                PI_COD_GERENTE: document.querySelector("[name='PI_COD_GERENTE']").value,
                PI_COD_UBICACIONES: document.querySelector("[name='PI_COD_UBICACIONES']").value,
                PI_COD_SUCURSAL: document.querySelector("[name='PI_COD_SUCURSAL']").value,
            };


            fetch(`https://road-master-server.vercel.app/vehiculos/`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Success:", data);
                    location.reload();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        });

        //view vehicle info
        $(document).on("click", "#showInfo", async function() {
            const id = $(this).data("id");
            const dataVehicle = [];

            try {
                const response = await fetch(
                    `https://road-master-server.vercel.app/vehiculo?id=${id}`
                );
                const data = await response.json();
                await dataVehicle.push(data[0]);
            } catch (error) {
                console.log(error);
            }
            $("#view #codSucursal").text(dataVehicle[0].COD_SUCURSAL);
            $("#view #nomSucursal").text(dataVehicle[0].NOM_SUCURSAL);
            $("#view #codGerente").text(dataVehicle[0].COD_GERENTE);
            $("#view #codubicacion").text(dataVehicle[0].COD_UBICACION);

        });


        //eliminar un registro, no necesita un modal
        $(document).on("click", "#deleteInfo", function() {
            const id = $(this).data("id");

            const data = {
                PI_COD_VEHICULO: id,
                PV_NOM_VEHICULO: "-", //simulacion de eliminar, colocarlo asi

            };

            fetch(`https://road-master-server.vercel.app/vehiculo/`, {
                    method: "PATCH",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Success:", data);
                    location.reload();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });


        });
    </script>
@stop

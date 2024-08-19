@extends('layout.app')


@section('subtitle', 'Modelos')

@section('content_body')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Modelos</h1>
        <x-adminlte-button label="Agregar un modelo" theme="primary" data-toggle="modal" data-target="#insert" />
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
    <x-adminlte-modal onclick="" id="view" size="lg" title="Información de modelo">
        <div class="form-group">
            <label for="nomModelo">Nombre del modelo</label>
            <p id="nomModelo"></p>
        </div>
        </div>
        <div class="form-group">
            <label for="fecIngreso">Fecha de Ingreso</label>
            <p id="fecIngreso"></p>
        </div>
        <div class="form-group">
            <label for="fecActualizacion">Fecha de Actualizacion</label>
            <p id="fecActualizacion"></p>
        </div>
    </x-adminlte-modal>


    {{-- este es el modal para insertar un registro, cambiar solo title y los campos a mostrar --}}
    <x-adminlte-modal onclick="" id="insert" size="lg" title="Insertar un nuevo Modelo">
        <form id="insertForm">
            <div class="row">
                <x-adminlte-input name="INSERT_PV_NOM_MODELO" label="Nombre del Modelo"
                    placeholder="Ingresa el nombre del Modelo" fgroup-class="col-md-6" />    
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save" />
        </div>
    </form>
    </x-adminlte-modal>


    {{-- este es el modal para editar un registro, cambiar solo title y los campos a mostrar --}}
    <x-adminlte-modal onclick="" id="edit" size="lg" title="Modifica un Modelo">
        <form id="updateForm">
            <div class="row">
                <x-adminlte-input name="UPDATE_PI_COD_MODELO" label="Id del Modelo" value=""
                    placeholder="Ingresa el id del Modelo" id="cod" readonly="readonly"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PV_NOM_MODELO" label="Nombre del Modelo"
                    placeholder="Ingresa el nombre del Modelo" fgroup-class="col-md-6" />

            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save" />
        </form>


    </x-adminlte-modal>


@stop

@section('js')
    <script>
        haveInfo = ["SI", "NO"]

        $(document).on("click", "#editInfo", async function() {
            const id = $(this).data("id");
            $('#cod').val(id);
        });
        //update model data
        document.getElementById("updateForm").addEventListener("submit", function(event) {
            event.preventDefault();
            console.log(event)


            const data = {
                PI_COD_MODELO: document.getElementById("cod").value,
                PV_NOM_MODELO: document.querySelector("[name='UPDATE_PV_NOM_MODELO']").value,
            };



            fetch(`https://road-master-server.vercel.app/modelo/`, {
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


        //insert model
        document.getElementById("insertForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const data = {
                PV_NOM_MODELO: document.querySelector("[name='INSERT_PV_NOM_MODELO']").value,
            };



            fetch(`https://road-master-server.vercel.app/modelos/`, {
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

        //view model info
        $(document).on("click", "#showInfo", async function() {
            const id = $(this).data("id");
            const dataModel = [];

            try {
                const response = await fetch(
                    `https://road-master-server.vercel.app/modelo?id=${id}`
                );
                const data = await response.json();
                await dataModel.push(data[0]);
            } catch (error) {
                console.log(error);
            }

            $("#view #nomModelo").text(dataModel[0].NOM_MODELO);
            $("#view #fecIngreso").text(dataModel[0].FEC_INGRESO.split('T')[0] + " " + dataModel[
                    0] .FEC_INGRESO.split('T')[1].split('.')[0]);
            $("#view #fecActualizacion").text(dataModel[0].FEC_ACTUALIZACION.split('T')[0] + " " +
                dataModel[0].FEC_ACTUALIZACION.split('T')[1].split('.')[0]);
        });


        //eliminar un registro, no necesita un modal
        $(document).on("click", "#deleteInfo", function() {
            const id = $(this).data("id");

            const data = {
                PI_COD_MODELO: id,
                PV_NOM_MODELO: "-", //simulacion de eliminar, colocarlo asi

            };

            fetch(`https://road-master-server.vercel.app/modelo/`, {
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

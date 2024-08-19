@extends('layout.app')

@section('subtitle', 'Marcas')

@section('content_body')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Marcas</h1>
        <x-adminlte-button label="Agregar una marca" theme="primary" data-toggle="modal" data-target="#insert" />
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

    {{-- Modal para ver la información de una marca --}}
    <x-adminlte-modal id="view" size="lg" title="Información de Marca">
        <div class="form-group">
            <label for="nomMarca">Nombre de la Marca</label>
            <p id="nomMarca"></p>
        </div>
        <div class="form-group">
            <label for="fecIngreso">Fecha de Ingreso</label>
            <p id="fecIngreso"></p>
        </div>
        <div class="form-group">
            <label for="fecActualizacion">Fecha de Actualización</label>
            <p id="fecActualizacion"></p>
        </div>
    </x-adminlte-modal>

    {{-- Modal para insertar una nueva marca --}}
    <x-adminlte-modal id="insert" size="lg" title="Insertar una nueva Marca">
        <form id="insertForm">
            <div class="row">
                <x-adminlte-input name="INS_PV_NOM_MARCA" label="Nombre de la Marca"
                    placeholder="Ingresa el nombre de la marca" fgroup-class="col-md-6" />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
        </form>
    </x-adminlte-modal>

    {{-- Modal para editar una marca --}}
    <x-adminlte-modal id="edit" size="lg" title="Editar Marca">
        <form id="updateForm">
            <div class="row">
                <x-adminlte-input name="UPT_PI_COD_MARCA" label="Id de la Marca" value=""
                    placeholder="Ingresa el id de la Marca" id="cod" readonly="readonly"
                    fgroup-class="col-md-6" />
                <x-adminlte-input name="UPT_PV_NOM_MARCA" label="Nombre de la Marca"
                    placeholder="Ingresa el nombre de la marca" fgroup-class="col-md-6" />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
    </x-adminlte-modal>
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Actualizar marca
            $(document).on("click", "#editInfo", function() {
                const id = $(this).data("id");
                $('#cod').val(id);
            });

            document.getElementById("updateForm").addEventListener("submit", function(event) {
                event.preventDefault();
                const data = {
                    PI_COD_MARCA: document.getElementById("cod").value,
                    PV_NOM_MARCA: document.querySelector("[name='UPT_PV_NOM_MARCA']").value,
                };
                fetch(`https://road-master-server.vercel.app/marca/`, {
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

            // Ver información de marca
            $(document).on("click", "#showInfo", async function() {
                const id = $(this).data("id");
                const dataMarca = [];
                try {
                    const response = await fetch(`
                    https://road-master-server.vercel.app/marca?id=${id}`);
                    const data = await response.json();
                    dataMarca.push(data[0]);
                } catch (error) {
                    console.log(error);
                }
                $("#view #nomMarca").text(dataMarca[0].NOM_MARCA);
                $("#view #fecIngreso").text(dataMarca[0].FEC_INGRESO.split('T')[0]);
                $("#view #fecActualizacion").text(dataMarca[0].FEC_ACTUALIZACION.split('T')[0]);
            });

            // Insertar marca
            document.getElementById("insertForm").addEventListener("submit", function(event) {
                event.preventDefault();
                const data = {
                    PV_NOM_MARCA: document.querySelector("[name='INS_PV_NOM_MARCA']").value,
                };
                fetch(`https://road-master-server.vercel.app/marcas/`, {
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

            // Eliminar marca
            $(document).on("click", "#deleteInfo", function() {
                const id = $(this).data("id");
                const data = {
                    PI_COD_MARCA: id,
                    PV_NOM_MARCA: "-", // Simulación de eliminación
                };
                fetch(`https://road-master-server.vercel.app/marca/`, {
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
        });
    </script>
@endsection

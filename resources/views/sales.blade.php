@extends('layout.app')

@section('subtitle', 'Ventas')

@section('content_body')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Ventas</h1>
        <x-adminlte-button label="Agregar una Venta" theme="primary" data-toggle="modal" data-target="#insert" />
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

    {{-- Modal para ver la información de una venta --}}
    <x-adminlte-modal id="view" size="lg" title="Información de Venta">
        <div class="form-group">
            <label for="desVenta">Descripción de la Venta</label>
            <p id="desVenta"></p>
        </div>
        <div class="form-group">
            <label for="monVenta">Monto de Venta</label>
            <p id="monVenta"></p>
        </div>
        <div class="form-group">
            <label for="valDescuento">Valor Descuento</label>
            <p id="valDescuento"></p>
        </div>
        <div class="form-group">
            <label for="monDescuento">Monto Descuento</label>
            <p id="monDescuento"></p>
        </div>
        <div class="form-group">
            <label for="canVendida">Cantidad Vendida</label>
            <p id="canVendida"></p>
        </div>
        <div class="form-group">
            <label for="fecIngreso">Fecha de Ingreso</label>
            <p id="fecIngreso"></p>
        </div>
        <div class="form-group">
            <label for="fecActualizacion">Fecha de Actualización</label>
            <p id="fecActualizacion"></p>
        </div>
        <div class="form-group">
            <label for="codVehiculo">Código de Vehículo</label>
            <p id="codVehiculo"></p>
        </div>
    </x-adminlte-modal>

    {{-- Modal para insertar una nueva venta --}}
    <x-adminlte-modal id="insert" size="lg" title="Insertar una nueva Venta">
        <form id="insertForm">
            <div class="row">
                <x-adminlte-input name="INSERT_PV_DES_VENTA" label="Descripción de la Venta"
                    placeholder="Ingresa la descripción de la venta" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PF_MONTO_VENTA" type="number" step="0.01" label="Monto de Venta"
                    placeholder="Ingresa el monto de la venta" fgroup-class="col-md-6" />

                <x-adminlte-select name="INSERT_PB_DESCUENTO" label="Descuento" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['SI', 'NO']" placeholder="¿Tiene descuento?" />
                </x-adminlte-select>

                <x-adminlte-input name="INSERT_MONTO_DESCUENTO" type="number" step="0.01" label="Monto Descuento"
                    placeholder="Ingresa el monto del descuento" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_CAN_VENDIDA" type="number" label="Cantidad Vendida"
                    placeholder="Ingresa la cantidad vendida" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_COD_VEHICULO" type="number" label="Código de Vehículo"
                    placeholder="Ingresa el código del vehículo" fgroup-class="col-md-6" />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save" />
        </form>
    </x-adminlte-modal>

    {{-- Modal para editar una venta --}}
    <x-adminlte-modal onclick="" id="edit" size="lg" title="Modificar una Venta">
        <form id="updateForm">
            <div class="row">
                <x-adminlte-input name="UPDATE_PI_COD_VENTA" label="Código de Venta" value=""
                    placeholder="Ingresa el código de la venta" id="cod" readonly="readonly"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PV_DES_VENTA" label="Descripción de la Venta"
                    placeholder="Ingresa la descripción de la venta" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PF_MONTO_VENTA" type="number" step="0.01" label="Monto de Venta"
                    placeholder="Ingresa el monto de la venta" fgroup-class="col-md-6" />

                <x-adminlte-select name="UPDATE_PB_DESCUENTO" label="Descuento" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['SI', 'NO']" placeholder="¿Tiene descuento?" />
                </x-adminlte-select>

                <x-adminlte-input name="UPDATE_MONTO_DESCUENTO" type="number" step="0.01" label="Monto Descuento"
                    placeholder="Ingresa el monto del descuento" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_CAN_VENDIDA" type="number" label="Cantidad Vendida"
                    placeholder="Ingresa la cantidad vendida" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_COD_VEHICULO" type="number" label="Código de Vehículo"
                    placeholder="Ingresa el código del vehículo" fgroup-class="col-md-6" />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success"
                icon="fas fa-lg fa-save" />
        </form>

    </x-adminlte-modal>

@stop

@section('js')
    <script>
        const haveInfo = ["SI", "NO"];


        $(document).on("click", "#editInfo", async function() {
            const id = $(this).data("id");
            $('#cod').val(id);
        });
        // Update sale data
        document.getElementById("updateForm").addEventListener("submit", function(event) {
            event.preventDefault();
            console.log(event)


            const data = {
                PI_COD_VENTA: document.getElementById("cod").value,
                PV_DES_VENTA: document.querySelector("[name='UPDATE_PV_DES_VENTA']").value,
                PF_MONTO_VENTA: document.querySelector("[name='UPDATE_PF_MONTO_VENTA']").value,
                PB_DESCUENTO: haveInfo[parseInt(document.querySelector("[name='UPDATE_PB_DESCUENTO']").value)],
                MONTO_DESCUENTO: document.querySelector("[name='UPDATE_MONTO_DESCUENTO']").value,
                PI_CAN_VENDIDA: document.querySelector("[name='UPDATE_PI_CAN_VENDIDA']").value,
                PI_COD_VEHICULO: document.querySelector("[name='UPDATE_PI_COD_VEHICULO']").value,
            };

            fetch(`https://road-master-server.vercel.app/venta/`, {
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

        // Insert sale
        document.getElementById("insertForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const data = {
                PV_DES_VENTA: document.querySelector("[name='INSERT_PV_DES_VENTA']").value,
                PF_MONTO_VENTA: document.querySelector("[name='INSERT_PF_MONTO_VENTA']").value,
                PB_DESCUENTO: haveInfo[parseInt(document.querySelector("[name='INSERT_PB_DESCUENTO']").value)],
                MONTO_DESCUENTO: document.querySelector("[name='INSERT_MONTO_DESCUENTO']").value,
                PI_CAN_VENDIDA: document.querySelector("[name='INSERT_PI_CAN_VENDIDA']").value,
                PI_COD_VEHICULO: document.querySelector("[name='INSERT_PI_COD_VEHICULO']").value,
            };

            fetch(`https://road-master-server.vercel.app/ventas/`, {
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

        // View sale info
        $(document).on("click", "#showInfo", async function() {
            const id = $(this).data("id");
            const dataSale = [];

            try {
                const response = await fetch(
                    `https://road-master-server.vercel.app/venta?id=${id}`
                );
                const data = await response.json();
                dataSale.push(data[0]);
            } catch (error) {
                console.log(error);
            }

            $("#view #desVenta").text(dataSale[0].DES_VENTA);
            $("#view #monVenta").text(dataSale[0].MON_VENTA);
            $("#view #valDescuento").text(dataSale[0].VAL_DESCUENTO);
            $("#view #monDescuento").text(dataSale[0].MON_DESCUENTO);
            $("#view #canVendida").text(dataSale[0].CAN_VENDIDA);
            $("#view #fecIngreso").text(dataSale[0].FEC_INGRESO.split('T')[0] + " " + dataSale[0].FEC_INGRESO
                .split('T')[1].split('.')[0]);
            $("#view #fecActualizacion").text(dataSale[0].FEC_ACTUALIZACION.split('T')[0] + " " + dataSale[0]
                .FEC_ACTUALIZACION.split('T')[1].split('.')[0]);
            $("#view #codVehiculo").text(dataSale[0].COD_VEHICULO);
        });

        // Delete a sale
        $(document).on("click", "#deleteInfo", function() {
            const id = $(this).data("id");

            const data = {
                PI_COD_VENTA: id,
                PV_DES_VENTA: "-", // Simulated delete, set like this
            };

            fetch(`https://road-master-server.vercel.app/venta/`, {
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

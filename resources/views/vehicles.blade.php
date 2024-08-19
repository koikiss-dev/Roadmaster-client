@extends('layout.app')


@section('subtitle', 'Vehiculos')

@section('content_body')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Vehiculos</h1>
        <x-adminlte-button label="Agregar un vehiculo" theme="primary" data-toggle="modal" data-target="#insert" />
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
    <x-adminlte-modal onclick="" id="view" size="lg" title="Información de Vehiculo">
        <div class="form-group">
            <label for="nomVehiculo">Nombre del Vehículo</label>
            <p id="nomVehiculo"></p>
        </div>
        <div class="form-group">
            <label for="desVehiculo">Descripción del Vehículo</label>
            <p id="desVehiculo"></p>
        </div>
        <div class="form-group">
            <label for="numPrecio">Precio</label>
            <p id="numPrecio"></p>
        </div>
        <div class="form-group">
            <label for="fecLanzamiento">Fecha de Lanzamiento</label>
            <p id="fecLanzamiento"></p>
        </div>
        <div class="form-group">
            <label for="tipVehiculo">Tipo de Vehículo</label>
            <p id="tipVehiculo"></p>
        </div>
        <div class="form-group">
            <label for="tipMotor">Tipo de Motor</label>
            <p id="tipMotor"></p>
        </div>
        <div class="form-group">
            <label for="tipTransmision">Tipo de Transmisión</label>
            <p id="tipTransmision"></p>
        </div>
        <div class="form-group">
            <label for="tipTraccion">Tipo de Tracción</label>
            <p id="tipTraccion"></p>
        </div>
        <div class="form-group">
            <label for="numConsumoCombustible">Consumo de Combustible (km/l)</label>
            <p id="numConsumoCombustible"></p>
        </div>
        <div class="form-group">
            <label for="numCapacidadTanque">Capacidad del Tanque (l)</label>
            <p id="numCapacidadTanque"></p>
        </div>
        <div class="form-group">
            <label for="numLongitud">Longitud (mm)</label>
            <p id="numLongitud"></p>
        </div>
        <div class="form-group">
            <label for="numAncho">Ancho (mm)</label>
            <p id="numAncho"></p>
        </div>
        <div class="form-group">
            <label for="numAltura">Altura (mm)</label>
            <p id="numAltura"></p>
        </div>
        <div class="form-group">
            <label for="numPeso">Peso (kg)</label>
            <p id="numPeso"></p>
        </div>
        <div class="form-group">
            <label for="numCapacidadCarga">Capacidad de Carga (kg)</label>
            <p id="numCapacidadCarga"></p>
        </div>
        <div class="form-group">
            <label for="numAsientos">Número de Asientos</label>
            <p id="numAsientos"></p>
        </div>
        <div class="form-group">
            <label for="numAirbags">Número de Airbags</label>
            <p id="numAirbags"></p>
        </div>
        <div class="form-group">
            <label for="valFrenos">Frenos</label>
            <p id="valFrenos"></p>
        </div>
        <div class="form-group">
            <label for="valVendido">Vendido</label>
            <p id="valVendido"></p>
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
            <label for="nomMarca">Marca</label>
            <p id="nomMarca"></p>
        </div>
        <div class="form-group">
            <label for="nomModelo">Modelo</label>
            <p id="nomModelo"></p>
        </div>
        <div class="form-group">
            <label for="nomSucursal">Sucursal</label>
            <p id="nomSucursal"></p>
        </div>
    </x-adminlte-modal>


    {{-- este es el modal para insertar un registro, cambiar solo title y los campos a mostrar --}}
    <x-adminlte-modal onclick="" id="insert" size="lg" title="Insertar un nuevo Vehiculo">
        <form id="insertForm">
            <div class="row">
                <x-adminlte-input name="INSERT_PV_NOM_VEHICULO" label="Nombre del Vehículo"
                    placeholder="Ingresa el nombre del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PV_DES_VEHICULO" label="Descripción del Vehículo"
                    placeholder="Ingresa la descripción del vehículo" fgroup-class="col-md-6" />


                <x-adminlte-input name="INSERT_PV_URL_IMAGE" label="Url de la imagen"
                    placeholder="Ingresa la url de la imagen" fgroup-class="col-md-6" />

                <x-adminlte-select name="INSERT_PE_TIPO_IMAGEN" fgroup-class="col-md-6" label="Tipo de imagen">
                    <x-adminlte-options :options="['BANNER', 'CONTENIDO']" placeholder="Tipo imagen" />
                </x-adminlte-select>

                <x-adminlte-input name="INSERT_PF_NUM_PRECIO" type="number" step="0.01" label="Precio"
                    placeholder="Ingresa el precio del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PD_FEC_LANZAMIENTO" type="datetime-local" label="Fecha de Lanzamiento"
                    placeholder="Ingresa la fecha de lanzamiento" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PV_TIP_VEHICULO" label="Tipo de Vehículo"
                    placeholder="Ingresa el tipo de vehículo" fgroup-class="col-md-6" />

                <x-adminlte-select name="INSERT_PE_TIP_MOTOR" label="Tipo de Motor" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['GASOLINA', 'DIESEL', 'ELECTRICO', 'HIBRIDO']" placeholder="Ingresa el tipo de motor" />
                </x-adminlte-select>

                <x-adminlte-select name="INSERT_PE_TIP_TRANSMISION" label="Tipo de Transmisión" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['MANUAL', 'AUTOMATICA', 'CVT']" placeholder="Ingresa el tipo de transmisión" />
                </x-adminlte-select>

                <x-adminlte-select name="INSERT_PE_TIP_TRACCION" label="Tipo de tracción" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['DELANTERA', 'TRASERA', 'AWD', '4WD']" placeholder="Ingresa el tipo de tracción" />
                </x-adminlte-select>

                <x-adminlte-input name="INSERT_PF_NUM_CONSUMO_COMBUSTIBLE_KM" label="Consumo de Combustible (km/l)"
                    type="number" step="0.01" placeholder="Ingresa el consumo de combustible"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PF_NUM_CAPACIDAD_TANQUE" type="number" label="Capacidad del Tanque (L)"
                    placeholder="Ingresa la capacidad del tanque" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_NUM_LONGITUD" type="number" label="Longitud (mm)"
                    placeholder="Ingresa la longitud del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_NUM_ANCHO" type="number" label="Ancho (mm)"
                    placeholder="Ingresa el ancho del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_NUM_ALTURA" type="number" label="Altura (mm)"
                    placeholder="Ingresa la altura del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_NUM_PESO" type="number" label="Peso (kg)"
                    placeholder="Ingresa el peso del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_NUM_CAPACIDAD_CARGA_KG" type="number" label="Capacidad de Carga (kg)"
                    placeholder="Ingresa la capacidad de carga" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_NUM_ASIENTOS" type="number" label="Número de Asientos"
                    placeholder="Ingresa el número de asientos" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_NUM_AIRBAGS" type="number" label="Número de Airbags"
                    placeholder="Ingresa el número de airbags" fgroup-class="col-md-6" />

                <x-adminlte-select name="INSERT_PB_VAL_FRENOS" label="Disponibilidad de frenos" fgroup-class="col-md-6">

                    <x-adminlte-options :options="['SI', 'NO']" placeholder="Tiene frenos" />
                </x-adminlte-select>


                <x-adminlte-select name="INSERT_PB_VAL_VENDIDO" label="Ha sido vendido" fgroup-class="col-md-6">

                    <x-adminlte-options :options="['SI', 'NO']" placeholder="Ha sido vendido" />
                </x-adminlte-select>

                <x-adminlte-input name="INSERT_PI_COD_MARCA" type="number" label="Marca del Vehículo"
                    placeholder="Ingresa la marca del vehículo" fgroup-class="col-md-6" />


                <x-adminlte-input name="INSERT_PI_COD_MODELO" type="number" label="Modelo del Vehículo"
                    placeholder="Ingresa el modelo del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="INSERT_PI_COD_SUCURSAL" type="number" label="Nombre de la Sucursal"
                    placeholder="Ingresa el nombre de la sucursal" fgroup-class="col-md-6" />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save" />
        </form>
    </x-adminlte-modal>


    {{-- este es el modal para editar un registro, cambiar solo title y los campos a mostrar --}}
    <x-adminlte-modal onclick="" id="edit" size="lg" title="Modifica un vehiculo">
        <form id="updateForm">
            <div class="row">
                <x-adminlte-input name="UPDATE_PI_COD_VEHICULO" label="Id del Vehículo" value=""
                    placeholder="Ingresa el id del vehículo" id="cod" readonly="readonly"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PV_NOM_VEHICULO" label="Nombre del Vehículo"
                    placeholder="Ingresa el nombre del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PV_DES_VEHICULO" label="Descripción del Vehículo"
                    placeholder="Ingresa la descripción del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_COD_IMAGEN" type="number" label="Codigo imagen"
                    placeholder="Ingresa el precio del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PV_URL_IMAGE" label="Url de la imagen"
                    placeholder="Ingresa la url de la imagen" fgroup-class="col-md-6" />

                <x-adminlte-select name="UPDATE_PE_TIPO_IMAGEN" fgroup-class="col-md-6" label="Tipo de imagen">
                    <x-adminlte-options :options="['BANNER', 'CONTENIDO']" placeholder="Tipo imagen" />
                </x-adminlte-select>

                <x-adminlte-input name="UPDATE_PF_NUM_PRECIO" type="number" step="0.01" label="Precio"
                    placeholder="Ingresa el precio del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PD_FEC_LANZAMIENTO" type="datetime-local" label="Fecha de Lanzamiento"
                    placeholder="Ingresa la fecha de lanzamiento" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PV_TIP_VEHICULO" label="Tipo de Vehículo"
                    placeholder="Ingresa el tipo de vehículo" fgroup-class="col-md-6" />

                <x-adminlte-select name="UPDATE_PE_TIP_MOTOR" label="Tipo de Motor" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['GASOLINA', 'DIESEL', 'ELECTRICO', 'HIBRIDO']" placeholder="Ingresa el tipo de motor" />
                </x-adminlte-select>

                <x-adminlte-select name="UPDATE_PE_TIP_TRANSMISION" label="Tipo de Transmisión" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['MANUAL', 'AUTOMATICA', 'CVT']" placeholder="Ingresa el tipo de transmisión" />
                </x-adminlte-select>

                <x-adminlte-select name="UPDATE_PE_TIP_TRACCION" label="Tipo de tracción" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['DELANTERA', 'TRASERA', 'AWD', '4WD']" placeholder="Ingresa el tipo de tracción" />
                </x-adminlte-select>

                <x-adminlte-input name="UPDATE_PF_NUM_CONSUMO_COMBUSTIBLE_KM" label="Consumo de Combustible (km/l)"
                    type="number" step="0.01" placeholder="Ingresa el consumo de combustible"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PF_NUM_CAPACIDAD_TANQUE" type="number" label="Capacidad del Tanque (L)"
                    placeholder="Ingresa la capacidad del tanque" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_NUM_LONGITUD" type="number" label="Longitud (mm)"
                    placeholder="Ingresa la longitud del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_NUM_ANCHO" type="number" label="Ancho (mm)"
                    placeholder="Ingresa el ancho del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_NUM_ALTURA" type="number" label="Altura (mm)"
                    placeholder="Ingresa la altura del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_NUM_PESO" type="number" label="Peso (kg)"
                    placeholder="Ingresa el peso del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_NUM_CAPACIDAD_CARGA_KG" type="number" label="Capacidad de Carga (kg)"
                    placeholder="Ingresa la capacidad de carga" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_NUM_ASIENTOS" type="number" label="Número de Asientos"
                    placeholder="Ingresa el número de asientos" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_NUM_AIRBAGS" type="number" label="Número de Airbags"
                    placeholder="Ingresa el número de airbags" fgroup-class="col-md-6" />

                <x-adminlte-select name="UPDATE_PB_VAL_FRENOS" label="Disponibilidad de frenos" fgroup-class="col-md-6">

                    <x-adminlte-options :options="['SI', 'NO']" placeholder="Tiene frenos" />
                </x-adminlte-select>


                <x-adminlte-select name="UPDATE_PB_VAL_VENDIDO" label="Ha sido vendido" fgroup-class="col-md-6">

                    <x-adminlte-options :options="['SI', 'NO']" placeholder="Ha sido vendido" />
                </x-adminlte-select>

                <x-adminlte-input name="UPDATE_PI_COD_MARCA" type="number" label="Marca del Vehículo"
                    placeholder="Ingresa la marca del vehículo" fgroup-class="col-md-6" />


                <x-adminlte-input name="UPDATE_PI_COD_MODELO" type="number" label="Modelo del Vehículo"
                    placeholder="Ingresa el modelo del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="UPDATE_PI_COD_SUCURSAL" type="number" label="Codigo de la Sucursal"
                    placeholder="Ingresa el nombre de la sucursal" fgroup-class="col-md-6" />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save" />
        </form>


    </x-adminlte-modal>


@stop

@section('js')
    <script>
        haveInfo = ["SI", "NO"];
        typeImage = ["BANNER", "CONTENIDO"]
        typeMotor = ["GASOLINA", "DIESEL", "ELECTRICO", "HIBRIDO"];
        typeTransimision = ["MANUAL", "AUTOMATICA", "CVT"];
        typeTraccion = ["DELANTERA", "TRASERA", "AWD", "4WD"]



        $(document).on("click", "#editInfo", async function() {
            const id = $(this).data("id");
            $('#cod').val(id);
        });
        //update vehicle data
        document.getElementById("updateForm").addEventListener("submit", function(event) {
            event.preventDefault();
            console.log(event)


            const data = {
                PI_COD_VEHICULO: document.getElementById("cod").value,
                PV_NOM_VEHICULO: document.querySelector("[name='UPDATE_PV_NOM_VEHICULO']").value,
                PV_DES_VEHICULO: document.querySelector("[name='UPDATE_PV_DES_VEHICULO']").value,
                PI_COD_IMAGEN: document.querySelector("[name='UPDATE_PI_COD_IMAGEN']").value,
                PV_URL_IMAGE: document.querySelector("[name='UPDATE_PV_URL_IMAGE']").value,
                PE_TIPO_IMAGEN: typeImage[parseInt(document.querySelector("[name='UPDATE_PE_TIPO_IMAGEN']")
                    .value)],
                PF_NUM_PRECIO: document.querySelector("[name='UPDATE_PF_NUM_PRECIO']").value,
                PD_FEC_LANZAMIENTO: document.querySelector("[name='UPDATE_PD_FEC_LANZAMIENTO']").value,
                PV_TIP_VEHICULO: document.querySelector("[name='UPDATE_PV_TIP_VEHICULO']").value,
                PE_TIP_MOTOR: typeMotor[parseInt(document.querySelector("[name='UPDATE_PE_TIP_MOTOR']").value)],
                PE_TIP_TRANSMISION: typeTransimision[parseInt(document.querySelector(
                    "[name='UPDATE_PE_TIP_TRANSMISION']").value)],
                PE_TIP_TRACCION: typeTraccion[parseInt(document.querySelector("[name='UPDATE_PE_TIP_TRACCION']")
                    .value)],
                PF_NUM_CONSUMO_COMBUSTIBLE_KM: document.querySelector(
                        "[name='UPDATE_PF_NUM_CONSUMO_COMBUSTIBLE_KM']")
                    .value,
                PF_NUM_CAPACIDAD_TANQUE: document.querySelector("[name='UPDATE_PF_NUM_CAPACIDAD_TANQUE']")
                    .value,
                PI_NUM_LONGITUD: document.querySelector("[name='UPDATE_PI_NUM_LONGITUD']").value,
                PI_NUM_ANCHO: document.querySelector("[name='UPDATE_PI_NUM_ANCHO']").value,
                PI_NUM_ALTURA: document.querySelector("[name='UPDATE_PI_NUM_ALTURA']").value,
                PI_NUM_PESO: document.querySelector("[name='UPDATE_PI_NUM_PESO']").value,
                PI_NUM_CAPACIDAD_CARGA_KG: document.querySelector("[name='UPDATE_PI_NUM_CAPACIDAD_CARGA_KG']")
                    .value,
                PI_NUM_ASIENTOS: document.querySelector("[name='UPDATE_PI_NUM_ASIENTOS']").value,
                PI_NUM_AIRBAGS: document.querySelector("[name='UPDATE_PI_NUM_AIRBAGS']").value,
                PB_VAL_FRENOS: haveInfo[parseInt(document.querySelector("[name='UPDATE_PB_VAL_FRENOS']")
                    .value)],
                PB_VAL_VENDIDO: haveInfo[parseInt(document.querySelector("[name='UPDATE_PB_VAL_VENDIDO']")
                    .value)],
                PI_COD_MARCA: document.querySelector("[name='UPDATE_PI_COD_MARCA']").value,
                PI_COD_MODELO: document.querySelector("[name='UPDATE_PI_COD_MODELO']").value,
                PI_COD_SUCURSAL: document.querySelector("[name='UPDATE_PI_COD_SUCURSAL']").value,
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
                PV_NOM_VEHICULO: document.querySelector("[name='INSERT_PV_NOM_VEHICULO']").value,
                PV_DES_VEHICULO: document.querySelector("[name='INSERT_PV_DES_VEHICULO']").value,
                PV_URL_IMAGE: document.querySelector("[name='INSERT_PV_URL_IMAGE']").value,
                PE_TIPO_IMAGEN: typeImage[parseInt(document.querySelector("[name='INSERT_PE_TIPO_IMAGEN']")
                    .value)],
                PF_NUM_PRECIO: document.querySelector("[name='INSERT_PF_NUM_PRECIO']").value,
                PD_FEC_LANZAMIENTO: document.querySelector("[name='INSERT_PD_FEC_LANZAMIENTO']").value,
                PV_TIP_VEHICULO: document.querySelector("[name='INSERT_PV_TIP_VEHICULO']").value,
                PE_TIP_MOTOR: typeMotor[parseInt(document.querySelector("[name='INSERT_PE_TIP_MOTOR']").value)],
                PE_TIP_TRANSMISION: typeTransimision[parseInt(document.querySelector(
                    "[name='INSERT_PE_TIP_TRANSMISION']").value)],
                PE_TIP_TRACCION: typeTraccion[parseInt(document.querySelector("[name='INSERT_PE_TIP_TRACCION']")
                    .value)],
                PF_NUM_CONSUMO_COMBUSTIBLE_KM: document.querySelector(
                        "[name='INSERT_PF_NUM_CONSUMO_COMBUSTIBLE_KM']")
                    .value,
                PF_NUM_CAPACIDAD_TANQUE: document.querySelector("[name='INSERT_PF_NUM_CAPACIDAD_TANQUE']")
                    .value,
                PI_NUM_LONGITUD: document.querySelector("[name='INSERT_PI_NUM_LONGITUD']").value,
                PI_NUM_ANCHO: document.querySelector("[name='INSERT_PI_NUM_ANCHO']").value,
                PI_NUM_ALTURA: document.querySelector("[name='INSERT_PI_NUM_ALTURA']").value,
                PI_NUM_PESO: document.querySelector("[name='INSERT_PI_NUM_PESO']").value,
                PI_NUM_CAPACIDAD_CARGA_KG: document.querySelector("[name='INSERT_PI_NUM_CAPACIDAD_CARGA_KG']")
                    .value,
                PI_NUM_ASIENTOS: document.querySelector("[name='INSERT_PI_NUM_ASIENTOS']").value,
                PI_NUM_AIRBAGS: document.querySelector("[name='INSERT_PI_NUM_AIRBAGS']").value,
                PB_VAL_FRENOS: haveInfo[parseInt(document.querySelector("[name='INSERT_PB_VAL_FRENOS']")
                    .value)],
                PB_VAL_VENDIDO: haveInfo[parseInt(document.querySelector("[name='INSERT_PB_VAL_VENDIDO']")
                    .value)],
                PI_COD_MARCA: document.querySelector("[name='INSERT_PI_COD_MARCA']").value,
                PI_COD_MODELO: document.querySelector("[name='INSERT_PI_COD_MODELO']").value,
                PI_COD_SUCURSAL: document.querySelector("[name='INSERT_PI_COD_SUCURSAL']").value,
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

            $("#view #nomVehiculo").text(dataVehicle[0].NOM_VEHICULO);
            $("#view #desVehiculo").text(dataVehicle[0].DES_VEHICULO);
            $("#view #numPrecio").text(dataVehicle[0].NUM_PRECIO);
            $("#view #fecLanzamiento").text(dataVehicle[0].FEC_LANZAMIENTO.split('T')[0]);
            $("#view #tipVehiculo").text(dataVehicle[0].TIP_VEHICULO);
            $("#view #tipMotor").text(dataVehicle[0].TIP_MOTOR);
            $("#view #tipTransmision").text(dataVehicle[0].TIP_TRANSMISION);
            $("#view #tipTraccion").text(dataVehicle[0].TIP_TRACCION);
            $("#view #numConsumoCombustible").text(dataVehicle[0].NUM_CONSUMO_COMBUSTIBLE_KM);
            $("#view #numCapacidadTanque").text(dataVehicle[0].NUM_CAPACIDAD_TANQUE);
            $("#view #numLongitud").text(dataVehicle[0].NUM_LONGITUD);
            $("#view #numAncho").text(dataVehicle[0].NUM_ANCHO);
            $("#view #numAltura").text(dataVehicle[0].NUM_ALTURA);
            $("#view #numPeso").text(dataVehicle[0].NUM_PESO);
            $("#view #numCapacidadCarga").text(dataVehicle[0].NUM_CAPACIDAD_CARGA_KG);
            $("#view #numAsientos").text(dataVehicle[0].NUM_ASIENTOS);
            $("#view #numAirbags").text(dataVehicle[0].NUM_AIRBAGS);
            $("#view #valFrenos").text(dataVehicle[0].VAL_FRENOS);
            $("#view #valVendido").text(dataVehicle[0].VAL_VENDIDO);
            $("#view #fecIngreso").text(dataVehicle[0].FEC_INGRESO.split('T')[0] + " " + dataVehicle[
                    0]
                .FEC_INGRESO.split('T')[1].split('.')[0]);
            $("#view #fecActualizacion").text(dataVehicle[0].FEC_ACTUALIZACION.split('T')[0] + " " +
                dataVehicle[0].FEC_ACTUALIZACION.split('T')[1].split('.')[0]);
            $("#view #nomMarca").text(dataVehicle[0].NOM_MARCA);
            $("#view #nomModelo").text(dataVehicle[0].NOM_MODELO);
            $("#view #nomSucursal").text(dataVehicle[0].NOM_SUCURSAL);
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

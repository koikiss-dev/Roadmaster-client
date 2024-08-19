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
                <x-adminlte-input name="PV_NOM_VEHICULO" label="Nombre del Vehículo"
                    placeholder="Ingresa el nombre del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PV_DES_VEHICULO" label="Descripción del Vehículo"
                    placeholder="Ingresa la descripción del vehículo" fgroup-class="col-md-6" />


                <x-adminlte-input name="PV_URL_IMAGE" label="Url de la imagen" placeholder="Ingresa la url de la imagen"
                    fgroup-class="col-md-6" />

                <x-adminlte-select name="PE_TIPO_IMAGEN" fgroup-class="col-md-6" label="Tipo de imagen">
                    <x-adminlte-options :options="['BANNER', 'CONTENIDO']" placeholder="Tipo imagen" />
                </x-adminlte-select>

                <x-adminlte-input name="PF_NUM_PRECIO" type="number" step="0.01" label="Precio"
                    placeholder="Ingresa el precio del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PD_FEC_LANZAMIENTO" type="datetime-local" label="Fecha de Lanzamiento"
                    placeholder="Ingresa la fecha de lanzamiento" fgroup-class="col-md-6" />

                <x-adminlte-input name="PV_TIP_VEHICULO" label="Tipo de Vehículo"
                    placeholder="Ingresa el tipo de vehículo" fgroup-class="col-md-6" />

                <x-adminlte-select name="PE_TIP_MOTOR" label="Tipo de Motor" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['GASOLINA', 'DIESEL', 'ELECTRICO', 'HIBRIDO']" placeholder="Ingresa el tipo de motor" />
                </x-adminlte-select>

                <x-adminlte-select name="PE_TIP_TRANSMISION" label="Tipo de Transmisión" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['MANUAL', 'AUTOMATICA', 'CVT']" placeholder="Ingresa el tipo de transmisión" />
                </x-adminlte-select>

                <x-adminlte-select name="PE_TIP_TRACCION" label="Tipo de tracción" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['DELANTERA', 'TRASERA', 'AWD', '4WD']" placeholder="Ingresa el tipo de tracción" />
                </x-adminlte-select>

                <x-adminlte-input name="PF_NUM_CONSUMO_COMBUSTIBLE_KM" label="Consumo de Combustible (km/l)"
                    type="number" step="0.01" placeholder="Ingresa el consumo de combustible"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="PF_NUM_CAPACIDAD_TANQUE" type="number" label="Capacidad del Tanque (L)"
                    placeholder="Ingresa la capacidad del tanque" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_LONGITUD" type="number" label="Longitud (mm)"
                    placeholder="Ingresa la longitud del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_ANCHO" type="number" label="Ancho (mm)"
                    placeholder="Ingresa el ancho del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_ALTURA" type="number" label="Altura (mm)"
                    placeholder="Ingresa la altura del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_PESO" type="number" label="Peso (kg)"
                    placeholder="Ingresa el peso del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_CAPACIDAD_CARGA_KG" type="number" label="Capacidad de Carga (kg)"
                    placeholder="Ingresa la capacidad de carga" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_ASIENTOS" type="number" label="Número de Asientos"
                    placeholder="Ingresa el número de asientos" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_AIRBAGS" type="number" label="Número de Airbags"
                    placeholder="Ingresa el número de airbags" fgroup-class="col-md-6" />

                <x-adminlte-select name="PB_VAL_FRENOS" label="Disponibilidad de frenos" fgroup-class="col-md-6">

                    <x-adminlte-options :options="['SI', 'NO']" placeholder="Tiene frenos" />
                </x-adminlte-select>


                <x-adminlte-select name="PB_VAL_VENDIDO" label="Ha sido vendido" fgroup-class="col-md-6">

                    <x-adminlte-options :options="['SI', 'NO']" placeholder="Ha sido vendido" />
                </x-adminlte-select>

                <x-adminlte-input name="PI_COD_MARCA" type="number" label="Marca del Vehículo"
                    placeholder="Ingresa la marca del vehículo" fgroup-class="col-md-6" />


                <x-adminlte-input name="PI_COD_MODELO" type="number" label="Modelo del Vehículo"
                    placeholder="Ingresa el modelo del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_COD_SUCURSAL" type="number" label="Nombre de la Sucursal"
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

                <x-adminlte-input name="PI_COD_VEHICULO" label="Id del Vehículo" value=""
                    placeholder="Ingresa el id del vehículo" id="cod" readonly="readonly"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="PV_NOM_VEHICULO" label="Nombre del Vehículo"
                    placeholder="Ingresa el nombre del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PV_DES_VEHICULO" label="Descripción del Vehículo"
                    placeholder="Ingresa la descripción del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_COD_IMAGEN" type="number" label="Codigo imagen"
                    placeholder="Ingresa el precio del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PV_URL_IMAGE" label="Url de la imagen" placeholder="Ingresa la url de la imagen"
                    fgroup-class="col-md-6" />

                <x-adminlte-select name="PE_TIPO_IMAGEN" fgroup-class="col-md-6" label="Tipo de imagen">
                    <x-adminlte-options :options="['BANNER', 'CONTENIDO']" placeholder="Tipo imagen" />
                </x-adminlte-select>

                <x-adminlte-input name="PF_NUM_PRECIO" type="number" step="0.01" label="Precio"
                    placeholder="Ingresa el precio del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PD_FEC_LANZAMIENTO" type="datetime-local" label="Fecha de Lanzamiento"
                    placeholder="Ingresa la fecha de lanzamiento" fgroup-class="col-md-6" />

                <x-adminlte-input name="PV_TIP_VEHICULO" label="Tipo de Vehículo"
                    placeholder="Ingresa el tipo de vehículo" fgroup-class="col-md-6" />

                <x-adminlte-select name="PE_TIP_MOTOR" label="Tipo de Motor" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['GASOLINA', 'DIESEL', 'ELECTRICO', 'HIBRIDO']" placeholder="Ingresa el tipo de motor" />
                </x-adminlte-select>

                <x-adminlte-select name="PE_TIP_TRANSMISION" label="Tipo de Transmisión" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['MANUAL', 'AUTOMATICA', 'CVT']" placeholder="Ingresa el tipo de transmisión" />
                </x-adminlte-select>

                <x-adminlte-select name="PE_TIP_TRACCION" label="Tipo de tracción" fgroup-class="col-md-6">
                    <x-adminlte-options :options="['DELANTERA', 'TRASERA', 'AWD', '4WD']" placeholder="Ingresa el tipo de tracción" />
                </x-adminlte-select>

                <x-adminlte-input name="PF_NUM_CONSUMO_COMBUSTIBLE_KM" label="Consumo de Combustible (km/l)"
                    type="number" step="0.01" placeholder="Ingresa el consumo de combustible"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="PF_NUM_CAPACIDAD_TANQUE" type="number" label="Capacidad del Tanque (L)"
                    placeholder="Ingresa la capacidad del tanque" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_LONGITUD" type="number" label="Longitud (mm)"
                    placeholder="Ingresa la longitud del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_ANCHO" type="number" label="Ancho (mm)"
                    placeholder="Ingresa el ancho del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_ALTURA" type="number" label="Altura (mm)"
                    placeholder="Ingresa la altura del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_PESO" type="number" label="Peso (kg)"
                    placeholder="Ingresa el peso del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_CAPACIDAD_CARGA_KG" type="number" label="Capacidad de Carga (kg)"
                    placeholder="Ingresa la capacidad de carga" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_ASIENTOS" type="number" label="Número de Asientos"
                    placeholder="Ingresa el número de asientos" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_NUM_AIRBAGS" type="number" label="Número de Airbags"
                    placeholder="Ingresa el número de airbags" fgroup-class="col-md-6" />

                <x-adminlte-select name="PB_VAL_FRENOS" label="Disponibilidad de frenos" fgroup-class="col-md-6">

                    <x-adminlte-options :options="['SI', 'NO']" placeholder="Tiene frenos" />
                </x-adminlte-select>


                <x-adminlte-select name="PB_VAL_VENDIDO" label="Ha sido vendido" fgroup-class="col-md-6">

                    <x-adminlte-options :options="['SI', 'NO']" placeholder="Ha sido vendido" />
                </x-adminlte-select>

                <x-adminlte-input name="PI_COD_MARCA" type="number" label="Marca del Vehículo"
                    placeholder="Ingresa la marca del vehículo" fgroup-class="col-md-6" />


                <x-adminlte-input name="PI_COD_MODELO" type="number" label="Modelo del Vehículo"
                    placeholder="Ingresa el modelo del vehículo" fgroup-class="col-md-6" />

                <x-adminlte-input name="PI_COD_SUCURSAL" type="number" label="Codigo de la Sucursal"
                    placeholder="Ingresa el nombre de la sucursal" fgroup-class="col-md-6" />
            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save" />
        </form>

        <span id="idField"></span>
    </x-adminlte-modal>

<!-- Sección de selección de vehículos -->
<section>
    <h2>Seleccionar Para Comparar Vehículos</h2>
    <x-adminlte-select2 id="selectVehiculos" name="vehiculos[]" multiple data-placeholder="Seleccione 2 o 3 vehículos" style="width: 100%;">
        @foreach ($info['config']['data'] as $row)
            <option value="{{ $row[0] }}">{{ $row[1] }}</option> <!--  -->
        @endforeach
    </x-adminlte-select2>
</section>

<!-- Sección de visualización de vehículos seleccionados -->
<section id="selectedVehicles" class="d-flex flex-wrap">
    <!--  -->
</section>
@stop

@push('css')
<style>
/* Estilos para el selector de vehículos */
#selectVehiculos {
    width: 100%;
    max-width: 600px;
    margin-bottom: 20px;
}

/* Estilos para Select2 */
.select2-container--default .select2-selection--multiple {
    border: 1px solid #ced4da;
    background-color: #6c756d; /* color del fondo del select2 Gris  */
    height: auto;
    padding: 10px;
    border-radius: 4px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    font-size: 1.5em;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #6c757d; /*  color del cuadro de seleccionGris oscuro */
    border-color: #6c757d;
    color: #fff;
    padding: 3px 10px;
    margin: 3px 0 3px 5px;
    border-radius: 20px;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #fff;
    margin-right: 10px;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
    color: #ff6666;
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    white-space: nowrap;
}

/* Estilos para la sección de visualización de vehículos */
#selectedVehicles {
    margin-top: 2rem;
}

#selectedVehicles .card {
    width: calc(33.33% - 1rem); /* Mostrar 3 tarjetas en una fila */
    margin: 0.5rem;
    background-color: #f0f0f1; /* Fondo gris claro */
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

#selectedVehicles .card:hover {
    transform: translateY(-5px);
}

#selectedVehicles .card img {
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    max-height: 150px;
    object-fit: cover;
}

#selectedVehicles .card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
}

#selectedVehicles .card-text {
    font-size: 0.875rem;
    color: #666;
}

/* Ajustes responsivos */
@media (max-width: 768px) {
    #selectedVehicles .card {
        width: calc(50% - 1rem); /* Mostrar 2 tarjetas en una fila en pantallas medianas */
    }
}

@media (max-width: 576px) {
    #selectedVehicles .card {
        width: calc(100% - 1rem); /* Mostrar 1 tarjeta en una fila en pantallas pequeñas */
    }
}

section {
    margin: 20px 0;
}

h2 {
    margin-bottom: 15px;
    font-size: 1.5em;
    font-weight: bold;
    text-align: left;
}
</style>
@endpush



@section('js')
    <script>
        haveInfo = ["SI", "NO"];
        typeImage = ["BANNER", "CONTENIDO"]
        typeMotor = ["GASOLINA", "DIESEL", "ELECTRICO", "HIBRIDO"];
        typeTransimision = ["MANUAL", "AUTOMATICA", "CVT"];
        typeTraccion = ["DELANTERA", "TRASERA", "AWD", "4WD"]


        //update vehicle data
        document.getElementById("updateForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const data = {
                PI_COD_VEHICULO: document.getElementById("cod").value,
                PV_NOM_VEHICULO: document.querySelector("[name='PV_NOM_VEHICULO']").value,
                PV_DES_VEHICULO: document.querySelector("[name='PV_DES_VEHICULO']").value,
                PI_COD_IMAGEN: document.querySelector("[name='PI_COD_IMAGEN']").value,
                PV_URL_IMAGE: document.querySelector("[name='PV_URL_IMAGE']").value,
                PE_TIPO_IMAGEN: typeImage[parseInt(document.querySelector("[name='PE_TIPO_IMAGEN']").value)],
                PF_NUM_PRECIO: document.querySelector("[name='PF_NUM_PRECIO']").value,
                PD_FEC_LANZAMIENTO: document.querySelector("[name='PD_FEC_LANZAMIENTO']").value,
                PV_TIP_VEHICULO: document.querySelector("[name='PV_TIP_VEHICULO']").value,
                PE_TIP_MOTOR: typeMotor[parseInt(document.querySelector("[name='PE_TIP_MOTOR']").value)],
                PE_TIP_TRANSMISION: typeTransimision[parseInt(document.querySelector(
                    "[name='PE_TIP_TRANSMISION']").value)],
                PE_TIP_TRACCION: typeTraccion[parseInt(document.querySelector("[name='PE_TIP_TRACCION']")
                    .value)],
                PF_NUM_CONSUMO_COMBUSTIBLE_KM: document.querySelector("[name='PF_NUM_CONSUMO_COMBUSTIBLE_KM']")
                    .value,
                PF_NUM_CAPACIDAD_TANQUE: document.querySelector("[name='PF_NUM_CAPACIDAD_TANQUE']").value,
                PI_NUM_LONGITUD: document.querySelector("[name='PI_NUM_LONGITUD']").value,
                PI_NUM_ANCHO: document.querySelector("[name='PI_NUM_ANCHO']").value,
                PI_NUM_ALTURA: document.querySelector("[name='PI_NUM_ALTURA']").value,
                PI_NUM_PESO: document.querySelector("[name='PI_NUM_PESO']").value,
                PI_NUM_CAPACIDAD_CARGA_KG: document.querySelector("[name='PI_NUM_CAPACIDAD_CARGA_KG']").value,
                PI_NUM_ASIENTOS: document.querySelector("[name='PI_NUM_ASIENTOS']").value,
                PI_NUM_AIRBAGS: document.querySelector("[name='PI_NUM_AIRBAGS']").value,
                PB_VAL_FRENOS: haveInfo[parseInt(document.querySelector("[name='PB_VAL_FRENOS']").value)],
                PB_VAL_VENDIDO: haveInfo[parseInt(document.querySelector("[name='PB_VAL_VENDIDO']").value)],
                PI_COD_MARCA: document.querySelector("[name='PI_COD_MARCA']").value,
                PI_COD_MODELO: document.querySelector("[name='PI_COD_MODELO']").value,
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
                PV_NOM_VEHICULO: document.querySelector("[name='PV_NOM_VEHICULO']").value,
                PV_DES_VEHICULO: document.querySelector("[name='PV_DES_VEHICULO']").value,
                PV_URL_IMAGE: document.querySelector("[name='PV_URL_IMAGE']").value,
                PE_TIPO_IMAGEN: typeImage[parseInt(document.querySelector("[name='PE_TIPO_IMAGEN']").value)],
                PF_NUM_PRECIO: document.querySelector("[name='PF_NUM_PRECIO']").value,
                PD_FEC_LANZAMIENTO: document.querySelector("[name='PD_FEC_LANZAMIENTO']").value,
                PV_TIP_VEHICULO: document.querySelector("[name='PV_TIP_VEHICULO']").value,
                PE_TIP_MOTOR: typeMotor[parseInt(document.querySelector("[name='PE_TIP_MOTOR']").value)],
                PE_TIP_TRANSMISION: typeTransimision[parseInt(document.querySelector(
                    "[name='PE_TIP_TRANSMISION']").value)],
                PE_TIP_TRACCION: typeTraccion[parseInt(document.querySelector("[name='PE_TIP_TRACCION']")
                    .value)],
                PF_NUM_CONSUMO_COMBUSTIBLE_KM: document.querySelector("[name='PF_NUM_CONSUMO_COMBUSTIBLE_KM']")
                    .value,
                PF_NUM_CAPACIDAD_TANQUE: document.querySelector("[name='PF_NUM_CAPACIDAD_TANQUE']").value,
                PI_NUM_LONGITUD: document.querySelector("[name='PI_NUM_LONGITUD']").value,
                PI_NUM_ANCHO: document.querySelector("[name='PI_NUM_ANCHO']").value,
                PI_NUM_ALTURA: document.querySelector("[name='PI_NUM_ALTURA']").value,
                PI_NUM_PESO: document.querySelector("[name='PI_NUM_PESO']").value,
                PI_NUM_CAPACIDAD_CARGA_KG: document.querySelector("[name='PI_NUM_CAPACIDAD_CARGA_KG']").value,
                PI_NUM_ASIENTOS: document.querySelector("[name='PI_NUM_ASIENTOS']").value,
                PI_NUM_AIRBAGS: document.querySelector("[name='PI_NUM_AIRBAGS']").value,
                PB_VAL_FRENOS: haveInfo[parseInt(document.querySelector("[name='PB_VAL_FRENOS']").value)],
                PB_VAL_VENDIDO: haveInfo[parseInt(document.querySelector("[name='PB_VAL_VENDIDO']").value)],
                PI_COD_MARCA: document.querySelector("[name='PI_COD_MARCA']").value,
                PI_COD_MODELO: document.querySelector("[name='PI_COD_MODELO']").value,
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
        $(document).ready(function() {
    // Inicializar Select2 con las opciones requeridas
    $('#selectVehiculos').select2({
        width: '100%',
        dropdownAutoWidth: true,
    });

    // Función para manejar la selección de vehículos
    function handleVehicleSelection() {
        const selectedVehicles = $('#selectVehiculos').val();

        if (selectedVehicles.length < 2) {
            //alert('Por favor seleccione al menos 2 vehículos.');
        } else if (selectedVehicles.length > 3) {
            alert('No se pueden seleccionar más de 3 vehículos.');
        }

        // Mostrar los vehículos seleccionados (hasta 3)
        $('#selectedVehicles').empty();
        const vehiclesToShow = selectedVehicles.slice(0, 3); // Limitar a 3 vehículos

        vehiclesToShow.forEach(async function(vehicleId) {
            try {
                const response = await fetch(
                    `https://road-master-server.vercel.app/vehiculo?id=${vehicleId}`
                );
                const data = await response.json();
                const vehicleData = data[0];

                const vehicleCard = `
                    <div class="card m-2" data-vehicle-id="${vehicleId}">
                        <img src="${vehicleData.imagen}" class="card-img-top" alt="${vehicleData.NOM_VEHICULO}">
                        <div class="card-body">
                            <h5 class="card-title">${vehicleData.NOM_VEHICULO}</h5>
                            <p class="card-text">Descripción: ${vehicleData.DES_VEHICULO}</p>
                            <p class="card-text">Precio: ${vehicleData.NUM_PRECIO}</p>
                            <p class="card-text">Fecha de Lanzamiento: ${vehicleData.FEC_LANZAMIENTO.split('T')[0]}</p>
                            <p class="card-text">Tipo: ${vehicleData.TIP_VEHICULO}</p>
                            <p class="card-text">Marca: ${vehicleData.NOM_MARCA}</p>
                            <p class="card-text">Modelo: ${vehicleData.NOM_MODELO}</p>
                            <p class="card-text">Sucursal: ${vehicleData.NOM_SUCURSAL}</p>
                            <button class="btn btn-danger btn-eliminar">Eliminar</button>
                        </div>
                    </div>
                `;
                $('#selectedVehicles').append(vehicleCard);
            } catch (error) {
                console.error('Error al obtener los detalles del vehículo:', error);
                alert('Error al obtener los detalles del vehículo.');
            }
        });

        // Desactivar el selector si ya se han seleccionado 3 vehículos
        if (selectedVehicles.length > 3) {
            $('#selectVehiculos').prop('disabled', true);
        } else {
            $('#selectVehiculos').prop('disabled', false);
        }
    }

    // Función de debounce para mejorar la fluidez en la selección
    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            const context = this;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    // Aplicar la función handleVehicleSelection con debounce
    $('#selectVehiculos').on('change', debounce(handleVehicleSelection, 300));

    // Función para manejar la eliminación de vehículos desde las tarjetas
    $(document).on('click', '.btn-eliminar', function() {
        const vehicleId = $(this).closest('.card').data('vehicle-id');

        // Obtener los datos seleccionados en formato de arreglo de objetos
        const selectedData = $('#selectVehiculos').select2('data');

        // Encontrar el índice del elemento a eliminar
        const indexToRemove = selectedData.findIndex(item => item.id === vehicleId);

        // Si el elemento existe, eliminarlo y actualizar el Select2
        if (indexToRemove !== -1) {
            selectedData.splice(indexToRemove, 1);
            $('#selectVehiculos').val(selectedData.map(item => item.id)).trigger('change');
        }

        // Eliminar la tarjeta correspondiente
        $(this).closest('.card').remove();

        // Habilitar la selección si ahora hay menos de 3 elementos
        if (selectedData.length < 3) {
            $('#selectVehiculos').prop('disabled', false);
        }

        // Volver a llamar a la función para actualizar la vista
        handleVehicleSelection();
    });
});

    </script>
@stop

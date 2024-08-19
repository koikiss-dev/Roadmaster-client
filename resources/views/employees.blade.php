@extends('layout.app')

@section('subtitle', 'Empleados')

@section('content_body')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Empleados</h1>
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
    <x-adminlte-modal onclick="" id="view" size="lg" title="Información del Empleado">
        <div class="form-group">
            <label for="rolEmpleado">Rol del Empleado</label>
            <p id="rolEmpleado"></p>
        </div>
        <div class="form-group">
            <label for="dniPersona">DNI</label>
            <p id="dniPersona"></p>
        </div>
        <div class="form-group">
            <label for="nomEmpleado">Nombre del Empleado</label>
            <p id="nomEmpleado"></p>
        </div>
        <div class="form-group">
            <label for="fecNacimiento">Fecha de Nacimiento</label>
            <p id="fecNacimiento"></p>
        </div>
        <div class="form-group">
            <label for="tipEstadoCivil">Estado Civil</label>
            <p id="tipEstadoCivil"></p>
        </div>
        <div class="form-group">
            <label for="sexPersona">Sexo</label>
            <p id="sexPersona"></p>
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
            <label for="numTelefono">Telefono</label>
            <p id="numTelefono"></p>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <p id="email"></p>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <p id="direccion"></p>
        </div>

    </x-adminlte-modal>

    {{-- <x-adminlte-modal onclick="" id="insert" size="lg" title="Insertar un nuevo Empleado">
        <form id="insertForm">
            <div class="row">

                <x-adminlte-select name="VAL_ROL" fgroup-class="col-md-6" label="Rol de la Persona">
                    <x-adminlte-options :options="['GERENTE', 'DEPENDIENTE']" placeholder="Rol de la Persona" />
                </x-adminlte-select>


                <x-adminlte-input name="DNI_PERSONA" label="DNI de la persona" placeholder="Ingresa el DNI de la Persona"
                    fgroup-class="col-md-6" />


                <x-adminlte-input name="NOMBRE_COMPLETO" label="Nombre de la Persona"
                    placeholder="Ingresa el nombre de la persona" fgroup-class="col-md-6" />

                <x-adminlte-input name="FEC_NACIMIENTO" type="datetime-local" label="Fecha de Nacimiento"
                    placeholder="Ingresa la fecha de lanzamiento" fgroup-class="col-md-6" />

                <x-adminlte-select name="VAL_ESTADO_CIVIL" fgroup-class="col-md-6" label="Estado Civil de La Persona">
                    <x-adminlte-options :options="['SOLTERO', 'CASADO', 'VIUDO', 'DIVORCIADO']" placeholder="Estado Civil de La Persona" />
                </x-adminlte-select>

                <x-adminlte-select name="SEX_PERSONA" fgroup-class="col-md-6" label="Sexo de la Persona">
                    <x-adminlte-options :options="['H', 'M']" placeholder="Sexo de la Persona" />
                </x-adminlte-select>


                <x-adminlte-input name="COD_TELEFONO" label="Numero de Telefono" placeholder="Ingresa el Numero De Telefono"
                    fgroup-class="col-md-6" />


                <x-adminlte-input name="COD_EMAIL" label="Email de la persona" placeholder="Ingresa El Email de la Persona"
                    fgroup-class="col-md-6" />

                <x-adminlte-input name="COD_DIRECCION" label="DIRECCION de la persona"
                    placeholder="Ingresa La Direccion de la Persona" fgroup-class="col-md-6" />


            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save" />
        </form>
    </x-adminlte-modal> --}}

    {{-- <x-adminlte-modal onclick="" id="edit" size="lg" title="Modifica un Empleado">
        <form id="updateForm">

            <x-adminlte-input name="COD_EMPLEADO" label="Id del Empleado" value=""
                placeholder="Ingresa el id del empleado" id="cod" readonly="readonly" fgroup-class="col-md-6" />

            <div class="row">
                <x-adminlte-select name="VAL_ROL" fgroup-class="col-md-6" label="Rol de la Persona">
                    <x-adminlte-options :options="['GERENTE', 'DEPENDIENTE']" placeholder="Rol de la Persona" />
                </x-adminlte-select>


                <x-adminlte-input name="PV_DNI" label="DNI de la persona" placeholder="Ingresa el DNI de la Persona"
                    fgroup-class="col-md-6" />


                <x-adminlte-input name="NOMBRE_COMPLETO" label="Nombre de la Persona"
                    placeholder="Ingresa el nombre de la persona" fgroup-class="col-md-6" />

                <x-adminlte-input name="FEC_NACIMIENTO" type="datetime-local" label="Fecha de Nacimiento"
                    placeholder="Ingresa la fecha de lanzamiento" fgroup-class="col-md-6" />

                <x-adminlte-select name="VAL_ESTADO_CIVIL" fgroup-class="col-md-6" label="Estado Civil de La Persona">
                    <x-adminlte-options :options="['SOLTERO', 'CASADO', 'VIUDO', 'DIVORCIADO']" placeholder="Estado Civil de La Persona" />
                </x-adminlte-select>

                <x-adminlte-select name="SEX_PERSONA" fgroup-class="col-md-6" label="Sexo de la Persona">
                    <x-adminlte-options :options="['H', 'M']" placeholder="Sexo de la Persona" />
                </x-adminlte-select>

                <x-adminlte-input name="COD_TELEFONO" label="Numero de Telefono"
                    placeholder="Ingresa el Numero De Telefono" fgroup-class="col-md-6" />


                <x-adminlte-input name="COD_EMAIL" label="Email de la persona"
                    placeholder="Ingresa El Email de la Persona" fgroup-class="col-md-6" />

                <x-adminlte-input name="COD_DIRECCION" label="DIRECCION de la persona"
                    placeholder="Ingresa La Direccion de la Persona" fgroup-class="col-md-6" />

            </div>
            <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success"
                icon="fas fa-lg fa-save" />
        </form>

        <span id="idField"></span>
    </x-adminlte-modal> --}}
@stop

@section('js')
    <script>
        typeRol = ["GERENTE", "DEPENDIENTE"];
        typeCivil = ['SOLTERO', 'CASADO', 'VIUDO', 'DIVORCIADO'];
        typeSex = ['H', 'M'];

        /*     document.getElementById("updateForm").addEventListener("submit", function(event) {
                event.preventDefault();

                const data = {

                    VAL_ROL: typeRol[parseInt(document.querySelector("[name='VAL_ROL']").value)],
                    DNI_PERSONA: document.querySelector("[name='DNI_PERSONA']").value,
                    NOMBRE_COMPLETO: document.querySelector("[name='NOMBRE_COMPLETO']").value,
                    FEC_NACIMIENTO: document.querySelector("[name='FEC_NACIMIENTO']").value,
                    VAL_ESTADO_CIVIL: typeCivil[parseInt(document.querySelector("[name='VAL_ESTADO_CIVIL']")
                        .value)],
                    SEX_PERSONA: typeSex[parseInt(document.querySelector("[name='SEX_PERSONA']").value)],
                    COD_TELEFONO: document.querySelector("[name='COD_TELEFONO']").value,
                    COD_EMAIL: document.querySelector("[name='COD_EMAIL']").value,
                    COD_DIRECCION: document.querySelector("[name='COD_DIRECCION']").value,
                };

                fetch(`https://road-master-server.vercel.app/empleados/`, {
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


            document.getElementById("insertForm").addEventListener("submit", function(event) {
                event.preventDefault();

                const data = {
                    VAL_ROL: typeRol[parseInt(document.querySelector("[name='VAL_ROL']").value)],
                    DNI_PERSONA: document.querySelector("[name='DNI_PERSONA']").value,
                    NOMBRE_COMPLETO: document.querySelector("[name='NOMBRE_COMPLETO']").value,
                    FEC_NACIMIENTO: document.querySelector("[name='FEC_NACIMIENTO']").value,
                    VAL_ESTADO_CIVIL: typeCivil[parseInt(document.querySelector("[name='VAL_ESTADO_CIVIL']")
                        .value)],
                    SEX_PERSONA: typeSex[parseInt(document.querySelector("[name='SEX_PERSONA']").value)],
                    COD_TELEFONO: document.querySelector("[name='COD_TELEFONO']").value,
                    COD_EMAIL: document.querySelector("[name='COD_EMAIL']").value,
                    COD_DIRECCION: document.querySelector("[name='COD_DIRECCION']").value,

                };


                fetch(`https://road-master-server.vercel.app/empleados/`, {
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
            }); */

        $(document).on("click", "#showInfo", async function() {
            const id = $(this).data("id");
            const dataEmployee = [];

            try {
                const response = await fetch(
                    `https://road-master-server.vercel.app/empleado?id=${id}`
                );
                const data = await response.json();
                await dataEmployee.push(data[0]);
            } catch (error) {
                console.log(error);
            }
            console.log(dataEmployee)

            $("#view #rolEmpleado").text(dataEmployee[0].VAL_ROL);
            $("#view #dniPersona").text(dataEmployee[0].DNI_PERSONA);
            $("#view #nomEmpleado").text(dataEmployee[0].NOMBRE_COMPLETO);
            $("#view #fecNacimiento").text(dataEmployee[0].FEC_NACIMIENTO.split('T')[0]);
            $("#view #tipEstadoCivil").text(dataEmployee[0].VAL_ESTADO_CIVIL);
            $("#view #sexPersona").text(dataEmployee[0].SEX_PERSONA);
            $("#view #fecIngreso").text(dataEmployee[0].FEC_INGRESO.split('T')[0] + " " + dataEmployee[
                    0]
                .FEC_INGRESO.split('T')[1].split('.')[0]);
            $("#view #fecActualizacion").text(dataEmployee[0].FEC_ACTUALIZACION.split('T')[0]);
            $("#view #numTelefono").text(dataEmployee[0].NUM_TELEFONO);
            $("#view #email").text(dataEmployee[0].VAL_EMAIL);
            $("#view #direccion").text(dataEmployee[0].DES_DIRECCION);

        });

        /* $(document).on("click", "#deleteInfo", function() {
            const id = $(this).data("id");

            const data = {
                PI_COD_EMPLEADO: id,
                PB_VAL_ROL: "-", //simulacion de eliminar, colocarlo asi

            };

            fetch(`https://road-master-server.vercel.app/empleado/`, {
                    method: "PATCH",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Success:", data);
                    //location.reload();
                })
                .catch((error) => {
                    console.error("Error:", error);
                });


        }); */
    </script>
@stop

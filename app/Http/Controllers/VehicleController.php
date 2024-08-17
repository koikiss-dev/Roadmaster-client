<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehicleController extends Controller
{

    public $url = "https://road-master-server.vercel.app";
    public function index()
    {

        //http gets
        $VehicleResponse = Http::get("{$this->url}/vehiculos"); //peticion para obtener la informacion

        $VehicleDataToJson = $VehicleResponse->json();

        /*
        =====================================
        toda la informacion para la tabla
        =====================================
        */

        //aca se colocan los heads que iran en la tabla, lo primero debe de ir igual a como vienen en la respuesta consulta y lo segundo es el valor que se mostrara del lado del cliente

        // la parte de acciones dejarlo como esta
        $heads = [
            "COD_VEHICULO" => "ID",
            "NOM_VEHICULO" => "Nombre",
            "DES_VEHICULO" => "Descripción",
            "TIP_VEHICULO" => "Tipo de vehiculo",
            "NOM_MARCA" => "Marca",
            "NOM_MODELO" => "Modelo",
            "NOM_SUCURSAL" => "Sucursal",
            "FEC_INGRESO" => "Fecha de Ingreso",
            "Acciones" => "Acciones"
        ];

        $dataTable = [];


        for ($i = 0; $i < count($VehicleDataToJson); $i++) {
            $row = [];
            foreach ($heads as $key => $value) {
                if (!array_key_exists($key, $VehicleDataToJson[$i]) && array_key_exists("Acciones", $heads)) {

                    //en los botones modificar la parte del data-id con lo que regrese la consulta
                    $btnEdit = '<button class="btn btn-xs btn-default text-blue mx-1 shadow" id="editInfo" data-toggle="modal" data-id="' . $VehicleDataToJson[$i]['COD_VEHICULO'] . '" data-target="#edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';

                    $btnDelete = '<button class="btn btn-xs btn-default text-red mx-1 shadow" id="deleteInfo" data-id="' . $VehicleDataToJson[$i]['COD_VEHICULO'] . '" data-target="#delete">
                              <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';

                    $btnDetails = '<button type="button" class="btn btn-xs btn-default text-teal mx-1 shadow" id="showInfo" data-toggle="modal" data-id="' . $VehicleDataToJson[$i]['COD_VEHICULO'] . '" data-target="#view">
                <i class="fa fa-lg fa-fw fa-eye"></i>
            </button>';

                    $row[] = '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>';
                } else {
                    $row[] = $VehicleDataToJson[$i][$key];
                }
            }
            $dataTable[] = $row;
        }


        $configTable = [
            'data' => $dataTable,
            'order' => [[1, 'asc']],
            'ordering' => true,
        ];


        //informacion a mandar al blade
        $information = [
            'headsTable' => array_values($heads),
            'config' => $configTable,
        ];

        return view("vehicles")->with('info', $information);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

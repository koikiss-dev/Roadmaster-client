<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = "https://road-master-server.vercel.app";
        //http gets
        $VehicleResponse = Http::get("{$url}/vehiculos");

        $VehicleDataToJson = $VehicleResponse->json();

        /*
        =====================================
        toda la informacion para la tabla
        =====================================
        */

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

        $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';

        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';

        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

        for ($i = 0; $i < count($VehicleDataToJson); $i++) {
            $row = [];
            foreach ($heads as $key => $value) {
                if (!array_key_exists($key, $VehicleDataToJson[$i]) && array_key_exists("Acciones", $heads)) {
                    $row[] = '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>';
                } else {
                    $row[] = $VehicleDataToJson[$i][$key];
                }
            }
            $dataTable[] = $row;
        }


        $configTable = [
            'data' => $dataTable
        ];


        //informacion a mandar al blade
        $information = [
            'headsTable' => array_values($heads),
            'config' => $configTable
        ];

        return view("vehicles")->with('info', $information);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
        return view("vehicleInformation");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

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

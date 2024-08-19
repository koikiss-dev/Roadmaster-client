<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $url = "https://road-master-server.vercel.app";
    public function index()
    {
    
        //http gets
        $SalesResponse = Http::get("{$this->url}/ventas"); //peticion para obtener la informacion
        
        $SalesDataToJson = $SalesResponse->json();
        

        $heads = [
            "COD_VENTA" => "ID",
            "DES_VENTA" => "Descripción",
            "MON_VENTA" => "Monto",
            "VAL_DESCUENTO" => "Descuento",
            "MON_DESCUENTO" => "Monto con Descuento",
            "CAN_VENDIDA" => "Cantidad Vendida",
            "FEC_INGRESO" => "Fecha de Ingreso",
            "Acciones" => "Acciones"
        ];

        $dataTable = [];

        
        for ($i = 0; $i < count($SalesDataToJson); $i++) {
            $row = [];
            foreach ($heads as $key => $value) {
                if (!array_key_exists($key, $SalesDataToJson[$i]) && array_key_exists("Acciones", $heads)) {

                    //en los botones modificar la parte del data-id con lo que regrese la consulta
                    $btnEdit = '<button class="btn btn-xs btn-default text-blue mx-1 shadow" id="editInfo" data-toggle="modal" data-id="' . $SalesDataToJson[$i]['COD_VENTA'] . '" data-target="#edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';

                    $btnDelete = '<button class="btn btn-xs btn-default text-red mx-1 shadow" id="deleteInfo" data-id="' . $SalesDataToJson[$i]['COD_VENTA'] . '" data-target="#delete">
                              <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';

                    $btnDetails = '<button type="button" class="btn btn-xs btn-default text-teal mx-1 shadow" id="showInfo" data-toggle="modal" data-id="' . $SalesDataToJson[$i]['COD_VENTA'] . '" data-target="#view">
                <i class="fa fa-lg fa-fw fa-eye"></i>
            </button>';

                    $row[] = '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>';
                } else {
                    $row[] = $SalesDataToJson[$i][$key];
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
        
        return view("sales")->with('info', $information);   
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
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

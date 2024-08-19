<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BrandController extends Controller
{
    public $url = "https://road-master-server.vercel.app";

    public function index()
    {
        $MarcaResponse = Http::get("{$this->url}/marcas");
        $MarcaDataToJson = $MarcaResponse->json();

        $heads = [
            "COD_MARCA" => "ID",
            "NOM_MARCA" => "Nombre",
            "FEC_INGRESO" => "Fecha de Ingreso",
            "FEC_ACTUALIZACION" => "Fecha de Actualización",
            "Acciones" => "Acciones"
        ];

        $dataTable = [];

        for ($i = 0; $i < count($MarcaDataToJson); $i++) {
            $row = [];
            foreach ($heads as $key => $value) {
                if (!array_key_exists($key, $MarcaDataToJson[$i]) && array_key_exists("Acciones", $heads)) {
                    $btnEdit = '<button class="btn btn-xs btn-default text-blue mx-1 shadow" id="editInfo" data-toggle="modal" data-id="' . $MarcaDataToJson[$i]['COD_MARCA'] . '" data-target="#edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';

                    $btnDelete = '<button class="btn btn-xs btn-default text-red mx-1 shadow" id="deleteInfo" data-id="' . $MarcaDataToJson[$i]['COD_MARCA'] . '" data-target="#delete">
                              <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';

                    $btnDetails = '<button type="button" class="btn btn-xs btn-default text-teal mx-1 shadow" id="showInfo" data-toggle="modal" data-id="' . $MarcaDataToJson[$i]['COD_MARCA'] . '" data-target="#view">
                <i class="fa fa-lg fa-fw fa-eye"></i>
            </button>';

                    $row[] = '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>';
                } else {
                    $row[] = $MarcaDataToJson[$i][$key];
                }
            }
            $dataTable[] = $row;
        }

        $configTable = [
            'data' => $dataTable,
            'order' => [[1, 'asc']],
            'ordering' => true,
        ];

        $information = [
            'headsTable' => array_values($heads),
            'config' => $configTable,
        ];

        return view("brand")->with('info', $information);
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


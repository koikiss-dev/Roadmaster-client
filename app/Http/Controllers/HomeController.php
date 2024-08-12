<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Nette\Utils\DateTime;

class HomeController extends Controller
{

    private function IterAndSumValues(array $array_values, string $key)
    {
        if (!is_array($array_values)) {
            return;
        }
        if (!is_string($key)) {
            return;
        }
        $sumValues = 0;

        foreach ($array_values as $k) {
            $sumValues += $k[$key];
        };

        return $sumValues;
    }

    private function DataChartPieBrands(array $vehicleArray, array $brandsArray): array
    {

        $dataBrandsChart = [];

        // Iterar sobre cada vehículo
        foreach ($vehicleArray as $vehicle) {
            $vehicleBrand = $vehicle['NOM_MARCA'];

            // revisar si la marca está en la lista de marcas únicas
            if (in_array($vehicleBrand, $brandsArray)) {
                if (!array_key_exists($vehicleBrand, $dataBrandsChart)) {
                    $dataBrandsChart[$vehicleBrand]['count'] = 0;
                }
                $dataBrandsChart[$vehicleBrand]['count'] += 1;
            }
        }

        return $dataBrandsChart;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = "https://road-master-server.vercel.app";
        // getters
        $GetBranches = Http::get("$url/sucursales");
        $GetSales = Http::get("$url/ventas");
        $GetVehicles = Http::get("$url/vehiculos");
        $GetEmployees = Http::get("$url/empleados");
        $GetBrands = Http::get("$url/marcas");

        // convert body as an array
        $BranchesToJson = $GetBranches->json();
        $SalesToJson = $GetSales->json();
        $VehiclesToJson = $GetVehicles->json();
        $EmployeesToJson = $GetEmployees->json();
        $BrandsToJson = $GetBrands->json();

        // data manipulation

        //count elements
        $CountBranches = count($BranchesToJson);
        $CountVehicles = count($VehiclesToJson);
        $CountEmployees = count($EmployeesToJson);
        $SumOfSales = $this->IterAndSumValues($SalesToJson, 'MON_VENTA');

        // reduce el array de vehiculos para agruparlo por marca
        /* $grouped = array_reduce($VehiclesToJson, function ($carry, $item) {
            $carry[$item['NOM_MARCA']][] = $item;
            return $carry;
            }); */

        $MONTHS = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $monthsSalesCant = array_fill(0, count($MONTHS), 0);


        for ($i = 0; $i < count($MONTHS); $i++) {
            foreach ($SalesToJson as $sales) {
                $ingreso = new DateTime($sales['FEC_INGRESO']);
                $month = $ingreso->format('F');
                if ($MONTHS[$i] === $month) {
                    $monthsSalesCant[$i] += 1;
                } else {
                    continue;
                }
            }
        }

        $onlyBrandNames = function ($g) {
            return $g['NOM_MARCA'];
        };

        $brands = array_values(array_unique(array_map($onlyBrandNames, $BrandsToJson)));


        // data charts
        $ChartVehicleData = [];

        // Extrae solo los numeros y los agrega al array del gráfico
        foreach ($this->DataChartPieBrands($VehiclesToJson, $brands) as $info) {
            $ChartVehicleData[] = $info['count'];
        }

        // information for box html element
        $InfoBoxs = [
            [
                'label' => "Ventas Totales",
                'value' => $SumOfSales,
                'icon' => "fas fa-shopping-cart",
                'icon_theme' => "lime"
            ],
            [
                'label' => "Vehiculos",
                'value' => $CountVehicles,
                'icon' => "fas fa-car",
                'icon_theme' => "indigo"
            ],
            [
                'label' => "Sucursales",
                'value' => $CountBranches,
                'icon' => "fas fa-building",
                'icon_theme' => "yellow"
            ],
            [
                'label' => "Empleados",
                'value' => $CountEmployees,
                'icon' => "fas fa-users",
                'icon_theme' => "primary"
            ]
        ];


        // create an unique array of data and use this with the view
        $information = [
            'ChartVehicleData' => $ChartVehicleData,
            'InfoBoxs' => $InfoBoxs,
            'Branches' => json_decode($GetBranches, true),
            'brands' => $brands,
            'months' => $MONTHS,
            'monthSalesCant' => $monthsSalesCant
        ];

        return view('home',)->with('info', $information);
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

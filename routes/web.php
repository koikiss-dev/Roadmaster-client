<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleSelectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get("/vehiculos", [VehicleController::class, 'index']);
Route::get("/vehiculo", [VehicleSelectionController::class, 'getVehicleDetails']);
Route::get("/marcas", [BrandController::class, 'index']);
Route::get("/modelos", [ModelController::class, 'index']);
Route::get("/ventas", [SalesController::class, 'index']);
Route::get("/sucursales", [BranchController::class, 'index']);
Route::get("/empleados", [EmployeesController::class, 'index']);

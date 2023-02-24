<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\ClientController;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('brands', function() {
    return Brand::all();
});

/*
Route::post('brands', function(Request $request) {
    return Brand::create($request->all());
});

Route::get('brands/{id}', function(Request $request, $id) {

    $brand = Brand::findOrFail($id);

    return $brand;
});

Route::delete('brands/{id}', function(Request $request, $id) {
    Brand::destroy($id);
});
*/

Route::apiResource('brands', BrandController::class);
Route::apiResource('clients', ClientController::class);

Route::get('brands/{brand}/carmodels', [BrandController::class, 'show_carmodels']);
Route::post('brands/{brand}/carmodels', [BrandController::class, 'store_carmodel']);

Route::get('carmodels', [
    CarModelController::class, 'index']
);

Route::post('carmodels/{carmodel}/vehicle', [CarModelController::class, 'store_vehicle']);

Route::put('clients/{client}/rentals/vehicle/{vehicle}', [ClientController::class, 'store_rental']);

<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function show(CarModel $carModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarModel $carModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $carModel)
    {
        //
    }

    public function store_vehicle(Request $request, CarModel $carmodel) {

        $vehicle = new Vehicle($request->all());

        $vehicle = $carmodel->vehicles()->save($vehicle);

        return $vehicle;
    }
}

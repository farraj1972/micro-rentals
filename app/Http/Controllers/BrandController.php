<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Brand::all();
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|unique:brands|max:30',
            'logo' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        }
        return Brand::create($request->all());
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
//        $brand = Brand::findOrFail($id);

        return $brand;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        //Brand::destroy($id);
        //
    }

    public function show_carmodels(Brand $brand) {
        return $brand->carmodels;
    }

    public function store_carmodel(Request $request, Brand $brand) {

        $carmodel = new CarModel($request->all());

        $carmodel = $brand->carmodels()->save($carmodel);

        return $carmodel;
    }
}

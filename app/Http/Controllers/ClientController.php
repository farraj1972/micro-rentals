<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Client::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }

    public function store_rental(Request $request, Client $client, Vehicle $vehicle) {

        $rental = new Rental($request->all());

        $rental->client_id = $client->id;

        $rental = $vehicle->rentals()->save($rental);

        return $rental;
    }
}

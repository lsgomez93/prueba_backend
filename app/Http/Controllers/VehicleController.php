<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::with('user')->get();


        return response()->json($vehicles);
    }

    // este metodo permite al cliente realizar el registro del vehiculo 
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new Vehicle($data);
        $user->user_id = $request->user()->id;
        $user->save();

        return response()->json($user, 201);
    }

    //Metodo que retorna la cantidad de vehiculos registrados por marca
    public function vehiclesByBrand()
    {

        $vehiclesByBrand = Vehicle::select('brand', DB::raw('count(*) as cantidad'))
            ->groupBy('brand')
            ->get();

        return  response()->json($vehiclesByBrand);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

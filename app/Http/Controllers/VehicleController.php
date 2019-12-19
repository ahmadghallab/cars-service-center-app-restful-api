<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\Vehicle;

class VehicleController extends Controller
{
  public function __construct()
  {
    // $this->middleware('jwt.auth', [
    //   'only' => ['store', 'update', 'destroy']
    // ]);
  }

  public function index()
  {
    $vehicles = Vehicle::all();
    return response()->json($vehicles);
  }

  public function show ($id) 
  {
    $vehicle = Vehicle::where('id', $id)->first();

    if ($vehicle) {
      return response()->json($vehicle);
    }

    return response()->json(['message' => 'Not Found.'], 404);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
        'vin' => 'required',
        'engine' => 'required',
        'customer' => 'required',
        'make' => 'required',
        'make_model' => 'required'
    ]);

    $data = $request->all();
    
    $vehicle = new Vehicle($data);

    if ($vehicle->save()) {
      return response()->json($vehicle, 201);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
        'vin' => 'required',
        'engine' => 'required',
        'customer' => 'required',
        'make' => 'required',
        'make_model' => 'required'
    ]);
  
    $data = $request->all();

    $vehicle = Vehicle::findOrFail($id);

    if ($vehicle->update($data)) {
      return response()->json($vehicle);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }

  public function destroy($id)
  {
    $vehicle = Vehicle::findOrFail($id);
    if ($vehicle->delete()) {
      return response()->json(['message' => 'Vehicle deleted.'], 204);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }
}
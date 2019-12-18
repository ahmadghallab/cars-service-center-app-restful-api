<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\Make;
use App\MakeModel;

class MakeController extends Controller
{
  public function __construct()
  {
    // $this->middleware('jwt.auth', [
    //   'only' => ['store', 'update', 'destroy']
    // ]);
  }

  public function index()
  {
    $makes = Make::with('makeModels')->get();
    return response()->json($makes);
  }

  public function show ($id) 
  {
    $make = Make::where('id', $id)->first();

    if ($make) {
      return response()->json($make);
    }

    return response()->json(['message' => 'Not Found.'], 404);
  }

  public function getModelsByMake ($id)
  {
    $models = MakeModel::where('make', $id)->get();
    return response()->json($models);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required'
    ]);

    $name = $request->input('name');
    
    $make = new Make(['name' => $name]);

    if ($make->save()) {
      return response()->json($make, 201);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required'
    ]);
    
    $name = $request->input('name');

    $make = Make::findOrFail($id);
    $make->name = $name;

    if ($make->update()) {
      return response()->json($make);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }

  public function destroy($id)
  {
    $make = Make::findOrFail($id);
    if ($make->delete()) {
      return response()->json(['message' => 'Make deleted.'], 204);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }
}
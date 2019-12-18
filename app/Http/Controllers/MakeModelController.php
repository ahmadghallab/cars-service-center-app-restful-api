<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\MakeModel;

class MakeModelController extends Controller
{
  public function __construct()
  {
    // $this->middleware('jwt.auth', [
    //   'only' => ['store', 'update', 'destroy']
    // ]);
  }

  public function index()
  {
    $makeModels = MakeModel::all();
    return response()->json($makeModels);
  }

  public function show ($id) 
  {
    $makeModel = MakeModel::where('id', $id)->first();

    if ($makeModel) {
      return response()->json($makeModel);
    }

    return response()->json(['message' => 'Not Found.'], 404);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'make' => 'required'
    ]);

    $data = [
      'name' => $request->input('name'),
      'make' => $request->input('make')
    ];
    
    $makeModel = new MakeModel($data);

    if ($makeModel->save()) {
      return response()->json($makeModel, 201);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
    ]);
  
    $data = [
      'name' => $request->input('name')
    ];

    $makeModel = MakeModel::findOrFail($id);

    if ($makeModel->update($data)) {
      return response()->json($makeModel);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }

  public function destroy($id)
  {
    $makeModel = MakeModel::findOrFail($id);
    if ($makeModel->delete()) {
      return response()->json(['message' => 'MakeModel deleted.'], 204);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }
}
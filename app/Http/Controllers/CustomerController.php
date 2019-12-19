<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\Customer;

class CustomerController extends Controller
{
  public function __construct()
  {
    // $this->middleware('jwt.auth', [
    //   'only' => ['store', 'update', 'destroy']
    // ]);
  }

  public function index()
  {
    $customers = Customer::all();
    return response()->json($customers);
  }

  public function show ($id) 
  {
    $customer = Customer::where('id', $id)->first();

    if ($customer) {
      return response()->json($customer);
    }

    return response()->json(['message' => 'Not Found.'], 404);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'phone' => 'required'
    ]);

    $data = $request->all();
    
    $customer = new Customer($data);

    if ($customer->save()) {
      return response()->json($customer, 201);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'phone' => 'required'
    ]);
  
    $data = $request->all();

    $customer = Customer::findOrFail($id);

    if ($customer->update($data)) {
      return response()->json($customer);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }

  public function destroy($id)
  {
    $customer = Customer::findOrFail($id);
    if ($customer->delete()) {
      return response()->json(['message' => 'Customer deleted.'], 204);
    }

    return response()->json(['message' => 'Something went wrong!'], 500);
  }
}
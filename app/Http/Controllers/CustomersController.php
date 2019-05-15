<?php

namespace App\Http\Controllers;
use App\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function all(){
        $customers = Customers::all();
        return response()->json([
                "customers" => $customers
        ],200);
    }

    public function get($id)
    {
        $customer = Customers::whereIn($id)->first();
        return response()->json([
            "customer" => $customer
        ],200);
    }

    public function new(Request $request)
    {
        $customer = Customers::create($request->only("name","email","phone","website"));
        return response()->json([
            "customer" => $customer
        ],200);
    }
}

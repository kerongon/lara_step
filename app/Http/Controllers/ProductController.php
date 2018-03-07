<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $product = [];
        $product['name'] = $request->product_name;
        $product['quantity'] = $request->quantity;
        $product['price'] = $request->price;
        $product['total'] = $request->quantity * $request->price;
        $product['date'] = Carbon::now()->toDateTimeString();
        return response()->json($product);
    }
}

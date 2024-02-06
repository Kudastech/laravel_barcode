<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function show()

    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $number = mt_rand(1000000000000, 9999999999999);


        if($this->productCodeExists($number))
        {

        $number = mt_rand(1000000000000, 9999999999999);

        }

        $request['product_code'] = $number;


        Product::create($request->all());

        return redirect(route('index'));


    }

    public function productCodeExists($number)
    {
        return Product::whereProductCode($number)->exists();
    }
}

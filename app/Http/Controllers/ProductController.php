<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Request $request)
    {
        return $product->all();
    }  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id, Product $product)
    {
        return $product->findOrFail($id);
    }
}

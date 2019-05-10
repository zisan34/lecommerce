<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;


class frontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('frontend.home')->with('products',Product::orderBy('created_at','DESC')->paginate(6));
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
        $product=Product::find($id);

        return view('frontend.single')->with('product',$product);
    }


}

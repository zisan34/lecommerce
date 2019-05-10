<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;

class OrdersController extends Controller
{
    //
    public function index()
    {
        return view('order.index')->with('orders',Order::all());
    }
    public function details($id)
    {
    	$order=Order::find($id);
    	return view('order.single')->with('order',$order);
    }
}

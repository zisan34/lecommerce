<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use Session;

use Cart;

use Stripe;

use App\Product;

use App\Order;
use App\OrderDetail;

class ShoppingController extends Controller
{
    //
    public function add(Request $request)
    {
    	$product=Product::find($request->id);

    	if($product->count<$request->quantity)
    	{
    		Session::flash('info','Out of Stock');
    		return redirect()->back();
    	}

    	$cart=Cart::add([
    		'id'=>$product->id,
    		'name'=>$product->name,
    		'qty'=>$request->quantity,
    		'price'=>$product->price,
    		'weight'=>$request->quantity
    	]);

    	Cart::associate($cart->rowId, 'App\Product');

    	// dd(cart::content());
    	Session::flash('success','Product added to Cart');

    	return redirect(route('cart.view'));
    }

    public function cart()
    {

    	return view('frontend.cart');
    }
    public function remove($id)
    {
    	Cart::remove($id);

    	Session::flash('success','Product removed from Cart');

    	return redirect()->back();
    }

    public function incr($id,$qty)
    {
    	$item=Cart::get($id);
    	if($item->model->count<$qty+1)
    	{
    		Session::flash('info','No more in stock');
    		return redirect()->back();
    	}

    	Cart::update($id,$qty+1);

    	Session::flash('success','Cart updated');

    	return redirect()->back();
    }
    public function decr($id,$qty)
    {

    	Cart::update($id,$qty-1);

    	Session::flash('success','Cart updated');

    	return redirect()->back();
    }

    public function checkout(Request $request)
    {
    	

    	if(Cart::content()->count()==0)
    	{
    		Session::flash('info','Your Cart is empty');
    		return redirect()->back();
    	}

    	$this->validate($request,[
    		'address'=>'required',
    		'phone'=>'required',
    		'city'=>'required',
    		'country'=>'required']);

    	$order=new Order;
		$order->address=$request->address;
		$order->phone=$request->phone;
		$order->city=$request->city;
		$order->country=$request->country;

		$order->save();

    	foreach (Cart::content() as $product) {
    		$orderDetail=new OrderDetail;

    		$orderDetail->order_id=$order->id;
    		$orderDetail->product_id=$product->model->id;
    		$orderDetail->quantity=$product->qty;

    		$orderDetail->save();

    	}
    	session(['order_id'=>$order->id]);
    	return view('frontend.checkout');
    }

    public function pay(Request $request)
    {
    	\Stripe\Stripe::setApiKey("sk_test_GxgvHMXBZvvknUWdWplQO6QO009Or70T0X");
		$charge = \Stripe\Charge::create([
			'amount' => Cart::total()*100, 
			'currency' => 'usd', 
			'description'=>$request->stripeEmail,
			'source' => $request->stripeToken,
			'receipt_email' =>$request->stripeEmail,
		]);

		$order=Order::find(session('order_id'));

		$order->paid=1;
		$order->save();

		Mail::to($request->stripeEmail)->send(new \App\Mail\PurchaseSuccessfull);

		Session::flash('success','Payment Successfull. Wait for our mail');





    	Cart::destroy();

		return redirect()->route('home');
    }

    public function destroy()
    {
    	Cart::destroy();

    	Session::flash('success','Cart cleared');

    	return redirect()->back();
    }
}

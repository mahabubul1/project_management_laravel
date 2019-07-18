<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;

class CartController extends Controller
{
	public function index() {
		$cart = (object)session('carts');
		$shipping = 0.00;
		$tax = 0.00;
		return view('pages.cart',compact('cart','shipping','tax'));
	}
    
    public function setCartItem(Request $request){
    	$jsonData['success'] = false;
    	if($request->ajax()){
    		$id = $request->id;
    		$plan = Plan::findOrFail($id);

    		if($request->duration == 'yearly') {
    			$price = ($plan->price * 10)/12;
    		}else {
    			$price = $plan->price;
    		}
    		if($plan){
    			session(['carts' => [
    				'plan_title' => $plan->title,
    				'plan_price' => $price,
    				'plan_qty'	 => $request->qty,
    				'plan_duration' => $request->duration
    			]]);

    			$jsonData['success'] = true;
    			return response()->json($jsonData);
    		}
    	}
    }

    public function removeCartItem(Request $request){
    	$jsonData['success'] = false;
    	if($request->ajax()){
    		$result = $request->session()->forget('carts');
    		if(empty($result)){
    			$jsonData['success'] = true;
    		}
    	}

    	return response()->json($jsonData);
    }
}

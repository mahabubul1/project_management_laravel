<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;

class PlanController extends Controller
{
    public function index() {
    	$plans = Plan::all();
    	return view('pages.price',compact('plans'));
    }
}

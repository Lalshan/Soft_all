<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function index(){
    	$all_category = Category::all();
    	return view('product.product_insert',compact('all_category'));
    }
    public function product_insert(Request $request){
    	$request->validate([
    		'product_name' => 'required',
    		'category_id' => 'required',
    		'product_description' => 'required',
    		'product_status' => 'required',
    		'product_price' => 'required',
    		'product_quantity' => 'required',
    		'product_alert' => 'required',
    	]);
    	Product::insert([
    		'product_name' => $request-> product_name,
    		'category_id' => $request-> category_id,
    		'product_description' => $request-> product_description,
    		'product_status' => $request-> product_status,
    		'product_price' => $request-> product_price,
    		'product_quantity' => $request-> product_quantity,
    		'product_alert' => $request-> product_alert,
    		'product_image' => $request-> product_image,
    	]);
    	return back()->with('status','Product inserted successfully');
    }
}

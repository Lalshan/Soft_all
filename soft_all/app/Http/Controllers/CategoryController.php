<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $all_cat = Category::all();
    	return view('category.category_insert',compact('all_cat'));
    }
    function category_insert(Request $request){

    	$request->validate([
            'cat_name' => 'required',
            'cat_des' => 'required'
        ]);

        Category::insert([
            'name' => $request-> cat_name,
            'description' => $request-> cat_des,
            'status' => $request-> pstatus
        ]);
        return back()->with('status','Category successfully inserted');
    	
    }
    function delete($cat_id){
        Category::find($cat_id)->delete();
        return back()->with('d_s','Category deleted successfully');
    }
    function edit($cat_id){
        $single_cat = Category::findOrFail($cat_id);
        return view('category.category_edit',compact('single_cat'));
    }
    function update(Request $request){
        Category::find($request->cat_id)->update([
            'name' => $request-> cat_name,
            'description' => $request-> cat_des,
            'status' => $request-> pstatus
        ]);
        return back()->with('status','Updated category successfully');
    }
    function clickstatus($cat_id){
       $status = Category::find($cat_id)->status;
        if($status == 1)
        {
            $status = 2;
            //echo "$status";
        }
        else
        {
            $status = 1;
            //echo "$status";
        }
        
        Category::find($cat_id)->update([
            'status' => $status
          ]);
        return back();
    }
}

@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-6 offset-3">
				<div class="card">
					<div class="card-header bg-success text-center">
						Add Product
					</div>
					<div class="card-body">
					    <form action="{{url('add/product/insert')}}" method="post" enctype="multipart/form-data">
							  @csrf
							  <div class="form-group">
							    <label for="a" >Product Name</label>
							    <input type="text" class="form-control" name="product_name" placeholder="Enter your product name" id="a" value="{{old('product_name')}}">
							  </div>
							   <div class="form-group">
							    <label for="s" >Product Category</label>
							    <select name="category_id" id="s" class="form-control">
							    	<option value="">--Select one--</option>
							    	@foreach($all_category as $category)
							    		<option value="{{$category->id}}">{{$category->name}}</option>
							    	@endforeach
							    </select>
							  </div>
							  <div class="form-group">
							    <label for="b">Product Description</label>
							    <textarea class="form-control" id="b" name="product_description" rows="2">{{old('product_description')}}</textarea>
							  </div>
							   <div class="form-group">
							    <label for="st" >Product Status</label>
							   	<select name="product_status" id="st" class="form-control">
							   		<option value="1">Published</option>
							   		<option value="2">Unpublished</option>
							   	</select>
							  </div>
							   <div class="form-group">
							    <label for="c" >Product Price</label>
							    <input type="number" class="form-control" name="product_price" placeholder="Enter your product price" id="c" value="{{old('product_price')}}">
							  </div>
							   <div class="form-group">
							    <label for="d" >Product Quantity</label>
							    <input type="number" class="form-control" name="product_quantity" placeholder="Enter your product quantity" id="d" value="{{old('product_quantity')}}">
							  </div>
							   <div class="form-group">
							    <label for="e">Alert Quantity</label>
							    <input type="number" class="form-control" name="product_alert" placeholder="Enter your product alert quantity" id="e"  value="{{old('product_alert')}}">
							  </div>
							  <div class="form-group">
							    <label for="f">Product Image</label>
							    <input type="file" class="form-control" id="f" name="product_image">
							  </div>
							  
							  <button type="submit" class="btn btn-block btn-success">Add product</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()
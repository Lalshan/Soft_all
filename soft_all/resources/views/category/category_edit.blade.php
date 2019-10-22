@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-6 offset-3">
        <div class="card">
          <div class="card-header bg-success text-center">
           Edit Product category
          </div>
           <div class="card-body">
            @if($errors->all())
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                 <li>{{$error}}</li>  
                @endforeach
              </div>
            @endif
            @if(session('status'))
              <div class="alert alert-success">
              {{session('status')}}
              </div>
              @endif
              <form action="{{url('category/update')}}" method="post" name="edit">
                @csrf
                 <div class="form-group">
                    <label>Category Name:</label>
                    <input type="text" class="form-control" value="{{$single_cat->name}}" name="cat_name">
                  </div>
                   <input type="hidden"  value="{{$single_cat->id}}" name="cat_id">
                  <div class="form-group">
                    <label >Description:</label>
                    <textarea name="cat_des" class="form-control" rows="3">{{$single_cat->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label >Publication Status:</label>
                    <select class="form-control" name="pstatus">
                      <option value="1">Published</option>
                      <option value="2">Unpublished</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-block btn-success">Update category</button>
              </form>
              <script>
              	document.forms['edit'].elements['pstatus'].value="{{$single_cat->status}}";
              </script>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
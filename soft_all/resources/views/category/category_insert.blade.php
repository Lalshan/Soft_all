@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header bg-success text-center">
           Add category
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
              <form action="{{url('category/insert')}}" method="post">
                @csrf
                 <div class="form-group">
                    <label>Category Name:</label>
                    <input type="text" class="form-control" placeholder="Enter category name" name="cat_name">
                  </div>
                  <div class="form-group">
                    <label >Description:</label>
                    <textarea name="cat_des" class="form-control" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label >Publication Status:</label>
                    <select class="form-control" name="pstatus">
                      <option value="">--Select one--</option>
                      <option value="1">Published</option>
                      <option value="2">Unpublished</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-block btn-success">Add category</button>
              </form>
            </div>
        </div>
      </div>

        <div class="col-6">
        <div class="card">
          <div class="card-header bg-success text-center">
           All Product category
          </div>
           <div class="card-body">
              @if(session('d_s'))
              <div class="alert alert-danger">
                {{session('d_s')}}
              </div>
              @endif
            <table class="table table-border">
              
              <tr>
                <th>SL. No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
              </tr>
              @forelse($all_cat as $cat)
              <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->description}}</td>
                <td>
                  <a href="{{url('click/status')}}/{{$cat->id}}">
                    {{($cat->status == 1)? 'Published':'Unpublished'}}
                  </a>
                </td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{url('delete/category')}}/{{$cat->id}}" class="btn btn-danger" onclick="return confirm('Are yoy sure to delete product!')">Delete</a>
                    <a href="{{url('edit/category')}}/{{$cat->id}}"class="btn btn-info">Edit</a>
                  </div>
                </td>
              </tr>
              @empty
              <tr class="text-center text-danger">
                <td colspan="6">No availabel product on your database!</td>
              </tr>
              @endforelse
            </table>
          
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
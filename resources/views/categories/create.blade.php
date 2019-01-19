@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>New Category</h1>

          @if (count($errors))
           <div class="alert alert-info">
              <ul>
                  @foreach($errors->all() as $error)

                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
                
          <form name="categories" action="{{ URL::to('categories') }}" method="POST">
          @csrf
            <div class="form-group col-lg-6"> 
            <label>Category Name</label>
              <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-success">Add New Category</button>
            </div>
          </form>
    
        </div>
    </div>
</div>
 @endsection
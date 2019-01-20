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
                
          <form name="shops" action="{{ URL::to('shops') }}" method="POST">
          @csrf

          <div class="form-group col-lg-6"> 
            <label>Shop owner</label>
              <select class="form-control" name="owner">

              <option value="{{ old('owner') }}">Choose Owner</option>

                @foreach($users as $u)
                  <option value="{{ $u->id }}" @if(old('owner') && old('owner') == $u->id) selected @endif>{{ $u->name }}</option>
                @endforeach

              </select>
            </div>


            <div class="form-group col-lg-6"> 
            <label>Shop Name</label>
              <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-success">Add New Shop</button>
            </div>
          </form>
    
        </div>
    </div>
</div>
 @endsection
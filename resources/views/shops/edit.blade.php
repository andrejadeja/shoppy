@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>Edit Category</h1>

        @if (count($errors))
           <div class="alert alert-info">
              <ul>
                  @foreach($errors->all() as $error)

                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
     
          <form name="shops" action="{{ URL::to('shops/'.$shop->id) }}" method="POST">
          @csrf
          {{ method_field('PATCH') }}

          <div class="form-group col-lg-6"> 
            <label>Shop owner</label>
              <select class="form-control" name="owner_id">

                @foreach($users as $u)
                  <option value="{{ $u->id }}" @if($shop->owner_id == $u->id) selected @endif>{{ $u->name }}</option>
                @endforeach

              </select>
            </div>


            <div class="form-group col-lg-6"> 
            <label>Shop Name</label>
              <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $shop->name }}">
            </div>
            <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-success">Edit Shop</button>
            </div>
          </form>

        </div>
    </div>
</div>
 @endsection
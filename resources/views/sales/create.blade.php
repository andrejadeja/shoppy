@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>New Sale</h1>

          @if (count($errors))
           <div class="alert alert-info">
              <ul>
                  @foreach($errors->all() as $error)

                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
                
          <form name="categories" action="{{ URL::to('sales') }}" method="POST">
          @csrf
           <div class="container">
                <div class="row">
                    <div class="form-group col-lg-6"> 
                          <label>Sale Title</label>
                          <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('name') }}">
                    </div>

               </div>
          </div>

            

           <div class="container">
                <div class="row">
                    <div class="form-group col-lg-6"> 
                      <label class="control-label" for="date">Valid Until</label>
                      <input class="form-control" id="date" name="valid_until" placeholder="MM/DD/YYY" type="text" autocomplete="off" />
                      </div>

               </div>
          </div>



          


            <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-success">Add New Sale</button>
            </div>
          </form>
    
        </div>
    </div>
</div>
 @endsection
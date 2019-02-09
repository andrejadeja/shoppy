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

          @if(isset($message))
          <div class="alert alert-info">
          {{ dd(message) }}
          </div>
          @endif
          
                
          <form name="categories" action="{{ URL::to('sales/'.$sale->id) }}" method="POST">
          @csrf

          {{ method_field('PATCH') }}

           <div class="container">
                <div class="row">
                    <div class="form-group col-lg-6"> 
                          <label>Sale Title</label>
                          <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $sale->title }}">
                    </div>

               </div>
          </div>

            

            <div class="container">
                <div class="row">
                    <div class="form-group col-lg-6"> 
                      <label class="control-label" for="date">Valid Until</label>
                      <input class="form-control" id="date" name="valid_until" placeholder="DD/MM/YYY" type="text" autocomplete="off" value="{{ date('d/m/Y', strtotime($sale->valid_until))}}"/>
                      </div>

               </div>
          </div>


          


            <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-success">Edit Sale</button>
            </div>
          </form>
    
        </div>
    </div>
</div>
 @endsection
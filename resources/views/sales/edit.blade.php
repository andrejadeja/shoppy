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
                  <div class='col-sm-6'>
                      <div class="form-group">
                      <label>Valid Until</label>
                          <div class='input-group date' id='datetimepicker1'>
                              <input type='text' name="valid_until" class="form-control" value="{{ date('d/m/Y', strtotime($sale->valid_until)) }}">
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <script type="text/javascript">
                      $(function () {
                          $('#datetimepicker1').datetimepicker();
                      });
                  </script>
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
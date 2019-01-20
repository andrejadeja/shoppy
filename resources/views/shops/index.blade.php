@extends('layouts.master')

@section('content')



<div class="page-header" style="margin-top: 80px">
    <div class="row">


        <div class="col-lg-12">

        @if (Session::has('message'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('message') }}
          </div>
        @endif
        <h1>Shops</h1>

        <a href="{{ URL::to('shops/create')}}" class="btn btn-md btn-success">Add Shop</a><br><br>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Created by</th>
                <th>Create Date</th>
                <th>Updated by</th>
                <th>Update Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($shops as $s)

              <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->owner->name }}</td>
                <td>{{ $s->user_create->name }}</td>
                <td>{{ date('d/m/Y', strtotime($s->created_at)) }}</td>
                <td>
                    @if($s->user_update)
                      {{ $s->user_update->name }}
                    @endif
                </td>
                <td>

                    @if($s->user_update)
                      {{ date('d/m/Y', strtotime($s->updated_at)) }}
                    @endif
                 </td>
                <td>

                  <a href="{{ URL::to('shops/'.$s->id.'/edit')}}" class="btn btn-md btn-primary">Edit</a>

                  <form action="{{ url('shops/'.$s->id)}}" method="post">
                  @csrf
                      <input type="submit" class="btn btn-md btn-danger" value="Delete" />
                      <input type="hidden" name="_method" value="delete" />

                  </form>
                
                </td>
              </tr>

            @endforeach
              
            </tbody>
          </table>
        </div>
    </div>
</div>
 @endsection
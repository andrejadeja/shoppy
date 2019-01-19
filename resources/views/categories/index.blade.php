@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>Categories</h1>

        <a href="{{ URL::to('categories/create')}}" class="btn btn-md btn-success">Add Category</a><br><br>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th>Category</th>
                <th>Created by</th>
                <th>Create Date</th>
                <th>Updated by</th>
                <th>Update Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($categories as $c)

              <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->user_create->name }}</td>
                <td>{{ date('d/m/Y', strtotime($c->created_at)) }}</td>
                <td>
                    @if($c->user_update)
                      {{ $c->user_update->name }}
                    @endif
                </td>
                <td>

                    @if($c->user_update)
                      {{ date('d/m/Y', strtotime($c->updated_at)) }}
                    @endif
                 </td>
                <td>

                  <a href="{{ URL::to('categories/'.$c->id.'/edit')}}" class="btn btn-md btn-primary">Edit</a>

                  <form action="{{ url('categories/'.$c->id)}}" method="post">
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
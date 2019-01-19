@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>Products</h1>

        <a href="{{ URL::to('products/create')}}" class="btn btn-md btn-success">Add Product</a><br><br>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th>Image</th>
                <th>Product</th>
                <th>Product number</th>
                <th>Price</th>
                <th>Category</th>
                <th>Created by</th>
                <th>Create Date</th>
                <th>Updated by</th>
                <th>Update Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $p)

              <tr>
                <td>{{ $p->id }}</td>
                <td><img src="{{ $p->image }}" width="50px"></td>
                <td>{{ $p->product }}</td>
                <td>{{ $p->product_number }}</td>
                <td>{{ $p->price }}€</td>
                <td>{{ $p->category->name }}</td>
                <td>{{ $p->user_create->name }}</td>
                <td>{{ date('d/m/Y', strtotime($p->created_at)) }}</td>
                <td>
                    @if($p->user_update)
                      {{ $p->user_update->name }}
                    @endif
                </td>
                <td>

                    @if($p->user_update)
                      {{ date('d/m/Y', strtotime($p->updated_at)) }}
                    @endif
                 </td>
                <td>

                  <a href="{{ URL::to('products/'.$p->id.'/edit')}}" class="btn btn-md btn-primary">Edit</a>

                  <form action="{{ url('products/'.$p->id)}}" method="post">
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
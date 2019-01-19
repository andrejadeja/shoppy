@extends('layouts.master')

@section('content')
<div class="page-header" style="margin-top: 80px">
    <div class="row">
        <div class="col-lg-12">
        <h1>Sales</h1>

        <a href="{{ URL::to('sales/create')}}" class="btn btn-md btn-success">Add Sale</a><br><br>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th>Sale name</th>
                <th>Valid until</th>
                <th>Created by</th>
                <th>Create Date</th>
                <th>Updated by</th>
                <th>Update Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($sales as $s)

              <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->title }}</td>
                <td>{{ date('d/m/Y', strtotime($s->valid_until)) }}</td>
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

                  <a href="{{ URL::to('sales/discounts/'.$s->id)}}" class="btn btn-md btn-success">Add products</a>

                  <a href="{{ URL::to('sales/'.$s->id.'/edit')}}" class="btn btn-md btn-primary">Edit</a>

                  <form action="{{ url('sales/'.$s->id)}}" method="post">
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
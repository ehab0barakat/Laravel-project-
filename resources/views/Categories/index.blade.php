
@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Category Name</td>
          <td >Action</td>
          <td >Remove</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Categories as $Category)
        <tr>
            <td>{{$Category->id}}</td>
            <td>{{$Category->name}}</td>
            <td><a href="{{ route('Categories.edit', $Category->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                {!! Form::open(['method' => 'DELETE','route' => ['Categories.destroy', $Category->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
    
  </table>
  
  {!! Form::open(['route' => ['Categories.create']  , "class" => "btn  btn-primary" , "method" => "get"]) !!}
                <td><button  class="btn btn-primary ">ADD Category</button></td>
  {!! Form::close() !!}
<div>
@endsection
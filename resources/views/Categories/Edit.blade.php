@extends('layout.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Category Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('Categories.Edit', $Category->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Category Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $Category->name }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Category ID :</label>
              <input type="text" class="form-control" name="id" value="{{ $Category->id }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
<!-- 
<h1>Edit Category</h1>
<hr>
<form action="{{url('Categories.Edit', [$Category->id])}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="id">Category ID</label>
        <input type="text" value="{{$Category->id}}" class="form-control" id="Categoryid"  name="id" >
    </div>
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" value="{{$Category->name}}" class="form-control" id="Categoryname" name="name" >
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
     
    <button type="submit" class="btn btn-primary">Submit</button>

</form> -->
@endsection
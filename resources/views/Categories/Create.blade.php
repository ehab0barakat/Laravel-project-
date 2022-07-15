
@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Create New Category
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

    <form action="{{ route('Categories.store')}}" method="POST" class="float-left mr-3 px-1">
      {{method_field('POST')}}
          <div class="form-group m-3">
              @csrf
              <label for="country_name">Category Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group m-3">
              <label for="cases">ID :</label>
              <input type="text" class="form-control" name="id"/>
          </div>
          <button type="submit" class="btn btn-primary m-3">Add Category</button>
      </form>
  </div>
</div>
@endsection
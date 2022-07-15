@extends('layouts.app')

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
      <form method="PUT" action="{{ route('Categories.update', $Category->id ) }}">
          <div class="form-group  m-3">
              @csrf
              @method('PUT')
              <label for="country_name">Category Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $Category->name }}"/>
          </div>
          <div class="form-group  m-3">
              <label for="cases">Category ID :</label>
              <input type="text" class="form-control" name="id" value="{{ $Category->id }}"/>
          </div>
          <button type="submit" class="btn btn-primary  m-3">Update Data</button>
      </form>
  </div>
</div>
@endsection
@extends("layouts.app") 

@section("header")
new post
@endsection

@section("content")


{!! Form::open(['route' => 'm-book.store' , "class" => "container" ]) !!}

    <div class="mb-3">
      <label class="form-label">title</label>
      {!! Form::text('title', null , ["class" => "form-control" ]   ); !!}
    </div>
    <div class="mb-3">
      <label class="form-label">auther</label>
      {!! Form::text('auther', null , ["class" => "form-control" ]   ); !!}
    </div>
    <div class="mb-3">
      <label class="form-label">description</label>
      {!! Form::text('description', null , ["class" => "form-control" ]   ); !!}
    </div>

    <div class="mb-3">
      <label class="form-label">price</label>
      {!! Form::number('price', null , ["class" => "form-control" ]   ); !!}
    </div>

    <div class="mb-3">
      <label class="form-label">image link</label>
      {!! Form::text('image', null , ["class" => "form-control" ]   ); !!}
    </div>


    <div class="mb-3">
      <label class="form-label">Categories</label>
      {!! Form::select('category_name_index', $categories ); !!}
    </div>




    <button type="submit" class="btn btn-primary text-dark">Submit</button>

{!! Form::close() !!}

    @endsection

@extends("layouts.app") 

@section("header")
new post
@endsection

@section("content")


{!! Form::open(['route' => 'm-book.store' , "class" => "container" ]) !!}


    <div class="mb-3">
      <label class="form-label">title</label>
      {!! Form::text('title', $book->title , ["class" => "form-control"] ); !!}
    </div>
    <div class="mb-3">
      <label class="form-label">auther</label>
      {!! Form::text('auther', $book->auther  , ["class" => "form-control" ]   ); !!}
    </div>
    <div class="mb-3">
      <label class="form-label">description</label>
      {!! Form::text('description',$book->description  , ["class" => "form-control" ]   ); !!}
    </div>

    <div class="mb-3">
      <label class="form-label">price</label>
      {!! Form::number('price',  $book->price  , ["class" => "form-control" ]   ); !!}
    </div>

    <div class="mb-3">
      <label class="form-label">image link</label>
      {!! Form::text('image',  $book->image  , ["class" => "form-control" ]   ); !!}
    </div>


    <div class="mb-3">
      <label class="form-label">Categories </label>
      {!! Form::select('category_name_index'  ,  [$categories] ); !!}
    </div>




    <button type="submit" class="btn btn-primary text-dark">Submit</button>

{!! Form::close() !!}

    @endsection

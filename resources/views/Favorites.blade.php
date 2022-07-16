@extends('layouts.app')

@section('content')
<section class="h-100" style="background-color: #eee;">

  @foreach ($Books as $book)

  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="card rounded-3 mb-4">

          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="{{ $book->image  }}" class="card-img-top img">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">{{ $book->title  }}</p>
                <p><span class="text-muted">Auther: {{ $book->auther }}</p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">{{ $book->price  }}</h5>
              </div>

              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                
              {!! Form::open(['route' => ['favourites.destroy' , $book->id ]  , "class" => "btn" , "method" => "delete"]) !!}
                <button type="submit" class="btn btn-outline-danger RemoveFromFavorites" book-id="{{ $book->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path></svg>
                </button>
              {!! Form::close() !!}
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  @endforeach

</section>

@endsection





@extends('layouts.app')

@section('content')

<section class="h-100 h-custom">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="h5">MY BOOK</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
        @foreach ($books as $book)
                        <tr>

                <th scope="row">
                  <div class="d-flex align-items-center">
                  <img src="{{ $book->image  }}" class="card-img-top img" style="width:200px";>
                    <div class="flex-column ms-4">
                      <p class="mb-2">{{ $book->title  }}</p>
                      <p class="mb-0">Auther: {{ $book->auther }}</p>
                    </div>
                  </div>
                </th>

                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">{{ $book->description  }}</p>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">{{ $book->price  }}</p>
                </td>



                <td class="align-middle">

                  {!! Form::open(['route' => ['cart.destroy' , $book->id ]  , "class" => "btn  p-0 btn-danger" , "method" => "delete"]) !!}
                  <td><button  class="btn p-1 btn-danger">Delete</button></td>
                  {!! Form::close() !!}

                </td>
              </tr>
        @endforeach

            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>

                <div class="container ">
                    <div>
                        {!! Form::open(['route' => ['redirectToPayU']  , "class" => "btn w-20 float-end me-5 p-0 btn-danger" , "method" => "Get"]) !!}
                        <td><button  class="btn fs-3 p-1 btn-danger">PAY</button></td>
                        {!! Form::close() !!}

                    </div>
                    <div class="w-50 float-end me-5 ">
                        <strong class="w-50 fs-1">TOTAL : {{$sum}}  </strong>
                    </div>
                </div>



</section>

@endsection

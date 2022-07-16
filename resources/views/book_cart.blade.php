


@extends('layouts.app')

@section('content')

<section class="h-100 h-custom">
@foreach ($books as $book)
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
              </tr>
            </thead>
            <tbody>
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
              </tr>

            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>
    @endforeach
</section>

@endsection

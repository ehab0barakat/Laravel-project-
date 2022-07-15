@extends("layouts.app")

@section("header")
new post
@endsection

@section("content")
         <div class="container ">
            <div class="row   ">
              <div class="  ">
                    <nav class="navbar bg-light  float-end">
                        <div class="container-fluid ">  Ordered By :
                            <div class="btn-group pl-2 " role="group" aria-label="Basic mixed styles example">

                                {!! Form::open(['route' => ['m-book.latest']  , "class" => "btn  p-0 ml-2 btn-danger" , "method" => "get"]) !!}

                                <td><button  class="btn p-1 btn-danger">Latest</button></td>

                                {!! Form::close() !!}



                                {!! Form::open(['route' => ['m-book.rate']  , "class" => "btn  p-0 btn-success" , "method" => "get"]) !!}

                                <td><button  class="btn p-1 btn-success">Rate</button></td>

                                {!! Form::close() !!}

                              </div>



                              {!! Form::open(['route' => ['m-book.search'] , "class" => "container"  , "method" => "get" ]); !!}

                              <div class="mb-3">
                                <label class="form-label">search</label>
                                {!! Form::text('search', null , ["class" => "form-control"] ); !!}
                              </div>

                              <p>

                                <span class="px-4">
                                    <label class="form-label">auther name</label>
                                    {!! Form::radio('in', 'auther'); !!}

                                </span>

                                <span class="px-4">
                                    <label class="form-label">book title</label>
                                    {!! Form::radio('in', 'title'); !!}
                                </span>

                              </p>


                              <button type="submit" class="btn btn-primary text-dark">Submit</button>

                              {!! Form::close() !!}


                        </div>
                      </nav>
              </div>
            </div>
         </div>
              </div>
              <div class="row m-0">
                <div class="col-lg-3 col-md-6 pt-5">
                    <ul class="list-group list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Food</a></div>

                          </div>
                          <span class="badge bg-primary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">History</a></div>

                          </div>
                          <span class="badge bg-primary rounded-pill">6</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Kids</a></div>

                          </div>
                          <span class="badge bg-primary rounded-pill">13</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Businesse</a></div>

                          </div>
                          <span class="badge bg-primary rounded-pill">7</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Computer science</a></div>

                          </div>
                          <span class="badge bg-primary rounded-pill">3</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="#">Arts</a></div>

                          </div>
                          <span class="badge bg-primary rounded-pill">20</span>
                        </li>
                      </ul>
                </div>


                @if ($books)

                @foreach ($books as $book)

                <div class="col-2 pt-5">
                    <div class="card h-100">

                        @if (auth()->user()->isAdmin)
                        <div class="d-flex " >

                            {!! Form::open(['route' => ['m-book.edit' , $book->id ]  , "class" => "btn  p-0 btn-primary" , "method" => "get"]) !!}

                            <td><button  class="btn p-1 btn-primary">Update</button></td>

                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['m-book.destroy' , $book->id ]  , "class" => "btn  p-0 btn-danger" , "method" => "delete"]) !!}

                            <td><button  class="btn p-1 btn-danger">Delete</button></td>

                            {!! Form::close() !!}
                        </div>
                        @endif

                        <form action="{{route('m-book.show' , $book->id )}}" method="get">
                            @csrf
                            <button  type="submit">
                                <img src="{{ $book->image  }}" class="card-img-top" alt="Pictuere Error">
                            </button>
                          </form>




                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title  }}</h5>
                            <p class="card-text"> {{ $book->description  }}</p>
                        </div>

                        <div class="card-footer">
                            <div class="d-grid gap-2 col-6 mx-auto">
                              <form action="{{route('buy')}}" method="post">
                                @csrf

                                <input type="hidden" name="book_id" value="{{ $book->id}}">

                                <input type="submit" value="buy" class="btn btn-warning ">
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

                @else
                <div class="col-3 pt-5"> there is no such a data like u searched for . </div>
                @endif



                @if (auth()->user()->isAdmin)
                {!! Form::open(['route' => ['m-book.create']  , "class" => "btn  btn-danger" , "method" => "get"]) !!}
                <td><button  class="btn  btn-danger">ADD BOOK</button></td>
                {!! Form::close() !!}
                @endif


              </div>
              <div class="pt-5">
              <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
              </div>




    @endsection


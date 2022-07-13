@extends("layouts.app") ;

@section("header")
new post
@endsection

@section("content")

         <div class="container ">
            <div class="row   ">
              <div class="  ">
                    <nav class="navbar bg-light float-end">
                        <div class="container-fluid ">  Ordered By :
                            <div class="btn-group pe-2 " role="group" aria-label="Basic mixed styles example">
                                <button type="button " class="btn btn-danger"> Latest</button>
                                <button type="button" class="btn btn-success"> Rate</button>
                              </div>
                          <form class="d-flex mt-3" role="formsearch">
                            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
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

                @foreach ($books as $book)

                <div class="col pt-5">

                    <div class="card h-100">
                        <div class="d-flex " >
                            <td><a href="{{route('m-book.edit' , $book->id )}}" class="btn p-0  btn-primary">Update</a></td>

                            {!! Form::open(['route' => ['m-book.destroy' , $book->id ]  , "class" => "btn  p-0 btn-danger" , "method" => "delete"]) !!}

                            <td><button  class="btn p-1 btn-danger">Delete</button></td>

                            {!! Form::close() !!}
                        </div>
                        <img src="{{ $book->image  }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title  }}</h5>
                            <p class="card-text"> {{ $book->description  }}</p>
                        </div>

                        <div class="card-footer">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-warning ">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {!! Form::open(['route' => ['m-book.create']  , "class" => "btn  btn-danger" , "method" => "get"]) !!}

                <td><button  class="btn  btn-danger">ADD BOOK</button></td>

                {!! Form::close() !!}

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

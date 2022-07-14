<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <body>

         <nav class="navbar fixed-top navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Mktabaty</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">My Books</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Favorites</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="navbar-text nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Login Account
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('users.index') }}">My Profile</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                  </li>
                </ul>
              </div>

            </div>
            </div>
         </nav>
         <div class="container ">
            <div class="row mt-3 w-20 ">
              <div class=" mt-5 ">
                    <nav class="navbar bg-light float-end">
                        <div class="container-fluid">  Ordered By :
                            <div class="btn-group p-2" role="group" aria-label="Basic mixed styles example">
                                <button type="button " class="btn btn-danger"> Latest</button>
                                <button type="button" class="btn btn-success"> Rate</button>
                              </div>
                          <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                        </div>
                      </nav>
              </div>
            </div>
         </div>
              </div>
              <div class="row">
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

                    <div class="col pt-5">
                      <div class="card h-100">
                        <img src="https://i.pinimg.com/564x/7f/f8/1b/7ff81b8fef7bca1ba2616cf5543450a0.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Book title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-warning ">Buy</button>
                                </div>
                        </div>
                      </div>
                    </div>
                    <div class="col pt-5">
                      <div class="card h-100">
                        <img src="https://i.pinimg.com/564x/67/63/63/6763638968d333d1629c55102cc4afeb.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Book title</h5>
                          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="button" class="btn btn-warning ">Buy</button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col pt-5">
                      <div class="card h-100">
                        <img src="https://i.pinimg.com/564x/9a/ce/1b/9ace1bcb5a2e6fa2c818505fe22a93f8.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Book title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-warning ">Buy</button>
                                </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
    </body>

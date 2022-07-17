@extends('layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogue</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ratings & Reviews</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissable fade show" role="alert" style="margin-top:10px;">
                {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ratings & Reviews</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="Ratings & Reviews" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Email</th>
                    <th>Rating</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($ratings as $rating)
                        <tr>
                            <td>{{ $rating['id'] }}</td>
                            <td>{{ $rating['user']['email'] }}</td>
                            <td>{{ $rating['rate'] }}</td>
                            <td>
                                @php $rating = $rating['rate'] ; @endphp

                                <p>
                                    <div class="placeholder" style="color: lightgray;">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="small">({{ $rating }})</span>
                                    </div>

                                    <div class="overlay" style="position: relative;top: -22px;">

                                        @while($rating>0)
                                            @if($rating >0.5)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="fas fa-star-half"></i>
                                            @endif
                                            @php $rating--; @endphp
                                        @endwhile

                                    </div>
                                </p>


                                <td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

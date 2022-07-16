@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header text-white bg-dark">Add New  <sapn class="font-weight-bold"></sapn></div>

                <div class="card-body">


                    {!! Form::open(array('route' => array('manager.store'))) !!}
                    @csrf
                    @method('post')
                    
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                        <div class="col-md-6 mb-2">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-md-2 col-form-label text-md-right">username</label>

                        <div class="col-md-6 mb-2">
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username"  required autocomplete="username" autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label text-md-right">password</label>

                        <div class="col-md-6 mb-2">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="password" autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required  >


                    </div>



                    <div class="form-group row">
                        <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                        <div class="col-md-6">
                            @foreach ($roles as $role)
                            <div class="form-check">
                            <input type="radio" value="{{ $role->id }}" name="roles">

                                    <label>{{ $role->name}}</label>

                            </div>
                            @endforeach
                        </div>
                    </div>


                    <button type="submit" class="btn btn-danger ">create</button>

                </form>
                {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

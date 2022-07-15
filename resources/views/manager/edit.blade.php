@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-white bg-dark">Edit  <sapn class="font-weight-bold">{{ $user->name}}</sapn></div>

                    <div class="card-body">

                        {!! Form::open(array('route' => array('manager.update', $user->id))) !!}
                        @csrf
                        @method('PUT')





                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required  >

                            </div>

                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                            <div class="col-md-6 mb-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>


                        </div>




                        <div class="form-group row">

                            <label for="username" class="col-md-2 col-form-label text-md-right">username</label>

                            <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required  >

                            </div>

                        </div>




                        <div class="form-group row d-flex">
                            <div class="form-check form-switch row d-flex ">
                                <label class="form-check-label col-md-6 " for="flexSwitchCheckChecked">Admin</label>
                                <div class="col-md-6">
                                    <input class="form-check-input" name=isAdmin type="checkbox" id="flexSwitchCheckChecked" {{ $user->isAdmin == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row d-flex">
                            <div class="form-check form-switch row d-flex ">
                                <label class="form-check-label col-md-6 " for="flexSwitchCheckChecked">Active</label>
                                <div class="col-md-6">
                                    <input class="form-check-input" name=isActive type="checkbox" id="flexSwitchCheckChecked" {{ $user->isActive == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>


{{--
                        <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                            <div class="col-md-6">
                                @foreach ($roles as $role)
                                <div class="form-check">
                                <input type="radio" value="{{ $role->id }}" name="roles"
                                @if($user->roles->pluck('id')->contains($role->id)) checked @endif >
                                        <label>{{ $role->name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div> --}}


                        <button type="submit" class="btn btn-danger ">update</button>

                        {{ Form::close() }}
                    </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

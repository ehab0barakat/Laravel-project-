@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">


        <div class="col-md-12">
            <div class="card">

                <div class="card-header text-white bg-primary">Manager CRUD</div>

                <div class="card-body">

                    <table class="table table-hover">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Operations</th>
                            <th scope="col">IsActive</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id}}</th>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>

                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>

                                    <td class="d-flex">
                                    

                                     
                                     <a href="{{ route('manager.edit',$user->id) }}">
                                         <button type="button" class="btn btn-primary float-left mr-3 " >Edit</button>
                                     </a>
                                

{{--                                      
                                        {!! Form::open(['method' => 'DELETE','route' => ['manager.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                     --}}
                                 
                                     <form action="{{ route('manager.destroy' , $user->id)}}" method="POST" class="float-left mr-3 px-1">
                                         @csrf
                                         {{method_field('DELETE')}}
                                         <button type="submit" class="btn btn-danger ">Delete</button>

                                     </form> 
                               




                                    </td>
                    
                                    <td class="bg-danger">
                                        <span >
                                            <input type="checkbox" data-id="{{ $user->id }}" name="isActive" class="js-switch" {{ $user->isActive == 1 ? 'checked' : '' }}>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>




@endsection




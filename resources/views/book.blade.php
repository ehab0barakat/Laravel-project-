@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/custom') }}">
<div class="container">
    <div class="row justify-content-center">
        @if(session()->has('success'))
        <div class="alert alert-success"> {{ session()->get('success') }} </div>
        @endif
        {{-- @foreach ($books as $book)  --}}
        <div class="col-md-12">
            <div class="card">

                <div class="card-header"> {{$book->title}} </div>

                    <div class="card mb-3" style="max-width: 540px; border: none;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{$book->image}}" class="card-img" alt="...">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$book->title}}</h5>
                                    <p class="card-text">{{$book->description}}</p>
                                    <div class="d-flex ">
                                    <p>auther:</p>
                                    <h5 >{{$book->auther}}</h5>
                                </div>
                                    <p class="card-text"><small class="text-muted">Last updated
                                            {{\Carbon\Carbon::parse($book->created_at)->diffForHumans()}}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Store Comment -->
                    <div>

                        <div class="form-row">
                            {!! Form::open(['route' => 'BookComment.store']) !!}
                            <div class="col-md-9">
                                {!! Form::hidden('book_id', $book->id) !!}
                                {!! Form::hidden('user_id', Auth::id()) !!}
                                {!! Form::textarea('comment',null,['class'=>'form-control','rows'=>3,
                                'placeholder'=>'your comment...']) !!}
                                {!! Form::submit('Comment',['class'=>'btn btn-success mt-3 w-100']) !!}
                            </div>
                            {!! Form::close() !!}

                            {{-- store Rates --}}




                          {{-- list comments --}}
                            <div class="mt-5">
                                <div class="list-group">
                                    @forelse ($book->comments as $comment)
                                    <span class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between bg-light">
                                            <h5 class="mb-1">{{$comment->user->name}}</h5>
                                            <small>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small>
                                        </div>
                                        <p class="mb-1 bg-light ">{{$comment->comment}}</p>
                                    </span>
                                    @empty
                                    <p>There Is No Comments ... !</p>
                                    @endforelse

                                </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
</div>
@endsection
<script>




</script>

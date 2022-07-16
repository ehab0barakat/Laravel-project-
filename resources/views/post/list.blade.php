<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</head>
<body>


<div class="row">
  <div class="leftcolumn">

   @foreach($posts as $post)
    <div class="card">


            {{-- {!! Form::open(['route' => 'post.view']) !!}
            <div class="col-md-9">
                {!! Form::hidden('post_id', $book->id) !!}
                {!! Form::hidden('user_id', Auth::id()) !!}
                {!! Form::textarea('comment',null,['class'=>'form-control','rows'=>3,
                'placeholder'=>'your comment...']) !!}
                {!! Form::submit('Forward Rate',['class'=>'btn btn-success mt-3 w-100']) !!}
            </div>
            {!! Form::close() !!} --}}
      <p><b><a href="{{route('post.view',$post->id)}}">forward Rate</a></b></p>



   @endforeach
  </div>
</div>
</div>
</body>
</html>

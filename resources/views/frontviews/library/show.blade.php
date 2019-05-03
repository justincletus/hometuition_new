@extends('frontviews.layouts.submaster')
@section('title', $title)
@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection
@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">


    <div class="col-sm-2 sidenav">
      <p><a href="{{url('/admission')}}">Admission</a></p>
      <p><a href="{{url('/courses')}}">Courses</a></p>
      <p><a href="{{url('/exams')}}">Examination</a></p>
      <p><a href="{{url('/library')}}">Online Library</a></p>

    </div>

    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <div>
        <h3 class="text-center"> {{ $book->title }}</h3>

        <?php if($book->filename == TRUE){ ?>
          <iframe src="{{ $book->filename }}" width="850" height="550"></iframe>
        <?php } ?>
        <h4>File will be publish soon.. thanks for visiting our website..</h4>
        <div class="col-md-6">



        </div>
      </div>

    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p><a href="{{ url('/contactus') }}">Advertising</a></p>
      </div>
      <div class="well">
        <p><a href="{{ url('/colleges') }}">Colleges in Mumbai </a> </p>
        <p><a href="{{ url('/colleges/syllabus') }}"> College Syllabus </a> </p>
      </div>
      <div class="well">
        <p><a href="{{ url('/schools') }}">Schools in Mumbai </a> </p>
        <p><a href="{{ url('/schools/syllabus') }}"> Schools Syllabus </a> </p>
      </div>

    </div>
  </div>
</div>


@stop

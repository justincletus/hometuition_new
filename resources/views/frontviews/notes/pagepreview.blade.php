@extends('frontviews.layouts.submaster')
@section('title',$title)

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav text-left">
      <h4 style="color:white;"><a href="{{ route('notes.show',$subsubcatname->slug ) }} ">
        {!! 'Topics of ' .$subsubcatname->title  .'<hr>' !!} </a> </h4>
      <?php foreach ($pages as $key => $value): ?>
        <p> <a href="{{ url('notes/getprograms', $value->slug )}}"> {{ $value->pagename }} </a> </p>

      <?php endforeach; ?>

    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <p> <a href="{{ route('notes.show',$subsubcatname->slug ) }}" class="btn btn-info">Back </a> </p>
      <div class="col-sm-12 col-sm-6 col-sm-4">
        <h4> {!! $page->pagename .'<hr>' !!}</h4>

        <p> {!! $page->details  !!}</p>
        <div class="row">
          @if(!empty($prevslug))
          <p><a href="{{ url('notes/getprograms', $prevslug->slug ) }}" class="btn btn-info"> prev</a> </p>
          @endif
          @if(!empty($nextslug))
          <p><a href="{{ url('notes/getprograms', $nextslug->slug ) }}" class="btn btn-info"> next</a> </p>
          @endif
        </div>

      </div>
    </div>
    <div class="col-sm-2 sidenav text-left">
      <div class="well">
        <p><a href="#">Top University</a></p>
        <p><a href="#">Top Rank College</a></p>
        <p><a href="#">Top Job Courses</a></p>
        <p><a href="#">University by States</a></p>
        <p><a href="#">Online MBA by B-Schools</a></p>
        <p><a href="#">Top IIT's</a></p>
        <p><a href="#">Top Medical Colleges</a></p>
        <p><a href="#">Free Admission</a></p>
        <p><a href="#">Exams for Jobs</a></p>
      </div>
      <div class="well">
        <p><a href="{{ url('/contactus')}}">Advertising</a></p>
      </div>
    </div>
  </div>
</div>


@stop

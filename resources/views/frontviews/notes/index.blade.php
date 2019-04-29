@extends('frontviews.layouts.submaster')
@section('title', 'Programming Language')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav text-left">
      <p><a href="#">Top University</a></p>
      <p><a href="#">Top Rank Colleges</a></p>
      <p><a href="#">Top Job Courses</a></p>
      <p><a href="#">University by States</a></p>
      <p><a href="#">Online MBA by B-Schools</a></p>
      <p><a href="#">Top IIT's</a></p>
      <p><a href="#">Top Medical Colleges</a></p>
      <p><a href="#">Free Admission</a></p>
      <p><a href="#">Exams for Jobs</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>



      <div class="col-sm-12 col-sm-6 col-sm-4">
        <h4> {!! 'List of Programming Language' .'<hr>' !!} </h4>

        <ul>
          @if(!empty($programs) && $programs->count())
          <?php foreach ($programs as $program): ?>
            <li><a href="{{ route('notes.show', $program->slug)}}">{{ $program->title}}</a></li>

          <?php endforeach; ?>
          @else
              <li>There are no data.</li>
          @endif

        </ul>
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

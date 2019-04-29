@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav text-left">
      <h4>Top Entrance Exams</h4>
      <?php foreach ($exams as $exam): ?>
        <p><a href="{{ url('examination', $exam->slug )}}">{{ $exam->title }}</a> </p>
      <?php endforeach; ?>
    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>

      <div class="col-sm-8 col-sm-6 col-sm-4">
        <h4 text-center>{!! $examcat->title .' Entrance Exams' !!}</h4>
        <ul class="examinationlistitem">
          <?php foreach ($examlists as $examlist): ?>
            <li>
              <div class="examlists">
                <h4> <a href="{{ url('examination/getexamdetails', $examlist->slug )}}">{!! '<small><b>'.$examlist->name .'</b></small>' !!}</a></h4>
                <p><a href="{{ $examlist->website }}" target="_blank">{{ $examlist->website}}</a> </p>
                <p><a href="{{ url('examination/getexamdetails', $examlist->slug )}}">more details..</a></p>

              </div>
              <hr>
            </li>
          <?php endforeach; ?>

        </ul>


      </div>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p><a href="{{ url('/library') }}">Online Library</a></p>
        <p><a href="{{ url('/syllabus')}}">Exam Syllabus</a></p>
      </div>
      <div class="well">
        <p><a href="{{ url('/contactus')}}">Advertising</a></p>
      </div>
    </div>
  </div>
</div>


@stop

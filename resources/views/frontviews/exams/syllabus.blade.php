@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav">
      <p><a href="{{ url('/library') }}">Online Library</a></p>
      <p><a href="{{ url('/syllabus')}}">Exam Syllabus</a></p>
      <p><a href="{{ url('/admission')}}">Admission</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <h2> Examination Syllabus Details and Online Support</h2>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p><a href="{{ url('/contactus')}}">Advertising</a> </p>
      </div>
      <div class="well">
        <p><a href="{{ url('/library')}}">eBooks</a> </p>
      </div>
    </div>
  </div>
</div>


@stop

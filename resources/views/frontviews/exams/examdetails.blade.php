@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav text-left">
      <h4>Top Entrance Exams</h4>

      <p> <a href="{{ url('examination',$subcat[0]['slug'] )}}"><?php  echo $subcat[0]['title']; ?></a> </p>
    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>

      <div class="col-sm-8 col-sm-6 col-sm-4">
        <p class="pull-right" style="background-color:#3a3f44cc;"> <i class="fa fa-chevron-circle-left"></i> <a href="{{ url('examination',$subcat[0]['slug'] )}}">Back</a> </p>
        <h4 text-center>{!! '<small>'.$examdet->name .'</small>' !!}</h4>
        <p>{!! $examdet->details !!}</p>

        <ul>


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

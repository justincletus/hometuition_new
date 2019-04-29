@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav text-left">


    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <div class="row">
        <ul class="list-inline coursestream">
          <?php foreach ($admissions as $admission): ?>
            <li class="list-inline-item">
              <a href="{{ url('admissions', $admission->slug )}}">{{ $admission->title }}</a>
            </li>

          <?php endforeach; ?>

        </ul>


      </div>

    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>


@stop

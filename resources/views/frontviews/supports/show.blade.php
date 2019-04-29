@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav text-left">

        <?php foreach ($cats as $cat): ?>

            <p><a href="{{ url('/', $cat->slug )}}">{{ $cat->title }}</a></p>

        <?php endforeach; ?>

    </div>
    <div class="col-sm-8">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>

      <h2 class="text-center">{{ $support->name  }}</h2>
      
      <img src="/img/portfolio/{{$support->image}}" alt="Online Tutor Mumbai">

      <p> {{ $support->details }}</p>
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

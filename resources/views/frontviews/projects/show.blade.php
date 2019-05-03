@extends('frontviews.layouts.submaster')
@section('title', 'College in Mumbai')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav">
      <p><a href="{{url('/admission')}}">Admission</a></p>
      <p><a href="{{url('/courses')}}">Courses</a></p>
      <p><a href="{{url('/exam')}}">Examination</a></p>
      <p><a href="{{url('/library')}}">Online Library</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <div class="col-sm-8">
        <h2 class="text-center">{{ $project->title }}</h2>
        <ul class="list-group" id="freedomship">
          <?php foreach ($prodet as $detail): ?>
            <li class="list-group-item">
              <div class="col-sm-8">
                <p> {{ $detail->title }} </p>
                <p class="pull-right"> <a href="{{ $detail->filename }}" target="_blank">Design View </a></p>

              </div>
            </li>


          <?php endforeach; ?>

        </ul>


      </div>

    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p><a href="{{ url('/contactus') }}">Advertising</a></p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

@stop

<script type="text/javascript">
// alert('test');


</script>

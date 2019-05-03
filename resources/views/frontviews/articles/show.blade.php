@extends('frontviews.layouts.submaster')
@section('title', 'Learn Laravel Easy')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav">
      <p><a href="{{url('/admissions')}}">Admission</a></p>
      <p><a href="{{url('/courses')}}">Courses</a></p>
      <p><a href="{{url('/examination')}}">Examination</a></p>
      <p><a href="{{url('/library')}}">Online Library</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <p><a href="{{route('articles.index')}}" class="btn btn-info">Back</a> </p>
      <div class="col-sm-1 pull-right">

      </div>
      <div class="col-sm-12 col-sm-6 col-sm-4">


        <h4>{!! $article->title . '<hr><br>' !!}</h4>
        <br>

        {!! $article->details !!}

      </div>
      <div class="col-sm-12 col-sm-6 col-sm-4">
        <div class="row">
          <div class="col-sm-1">
            @if(!empty($previous2))
            <p> <a href="{{ route('articles.show', $previous2->slug )}}" class="btn btn-info"> Prev</a> </p>
            @endif
          </div>
          <div class="col-sm-1 pull-right">
            @if(!empty($next2))
              <p> <a href="{{ route('articles.show', $next2->slug )}}" class="btn btn-info"> Next</a> </p>
            @endif
          </div>
        </div>

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

@extends('frontviews.layouts.submaster')
@section('title', 'Articles Page')

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
        @if($projects->count())

          <div class="col-sm-4">
          <?php foreach ($projects as $project): ?>
            <div class="col-sm-4">
              <img src="/img/projects/freedomship/{{ $project->filename }}" alt="Freedom Ship CoverImage "> Cover Image
            </div>

              <div class="portfolio-caption">
                <p class="text-muted"><a href="{{ route('projects.show',$project->slug) }}">{{ $project->title }} </a></p>
              </div>
            </div>
            <?php endforeach; ?>


          </div>



        @endif

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

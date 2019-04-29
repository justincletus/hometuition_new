@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav">
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
      <div class="breadcrumbs">
        {{ Breadcrumbs::render('home') }}
        
      </div>
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <div class="row">
        <div class="col-sm-8 col-sm-6 col-sm-4">
          <h4><small> List of Courses we supports for Admission </small></h4>
          <ul class="list-inline coursestream">
            <?php  $counter = 1; ?>
            <?php $rows = $coursecats->count(); ?>
            <?php foreach ($coursecats as $coursecat): ?>
              <li class="list-inline-item text-center" style="padding-bottom:20px;margin-left:5px">
                <a href="{{url('courses', $coursecat->slug)}}"> {{ $coursecat->title .' | ' }}</a>
                <?php if ($counter == 3): ?>
                  <br>
                  <?php $counter=1; ?>
                <?php endif; ?>
              </li>
              <?php $counter++; ?>
            <?php endforeach; ?>
          </ul>
        </div>


      </div>
      <div class="col-sm-8 col-sm-6 col-sm-4">
        <h4> {!! $title .'<hr>' !!} </h4>
        <p> </p>
        <ul>
          @if(!empty($courses) && $courses->count())
          <?php foreach ($courses as $course): ?>
            <li>Course Name : <a href="{{ url('courses', $course->slug)}}">{{ $course->name}}</a></li>

          <?php endforeach; ?>
          @else
              <li>There are no data.</li>
          @endif
          {!! '<br><br>' . $courses->render() !!}
        </ul>
      </div>

    </div>
    <div class="col-sm-2 sidenav">
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

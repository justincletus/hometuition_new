@extends('frontviews.layouts.submaster')
@section('title', '|Online Library')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav text-left">
      <p style="color:white;">Top Entrance Exams</p>
      <hr class="footerpartision">

      <?php foreach ($exams as $key => $value): ?>
        <p> <a href="{{ url('examination', $value->slug)}}"> {{ $value->title }}</a> </p>

      <?php endforeach; ?>
      <p style="color:white;">Notes </p>
      <hr class="footerpartision">

      <br>
      <?php foreach ($notes as $key => $value): ?>
        <p> <a href="{{ $value->slug }}"> {{ $value->title }} </a> </p>

      <?php endforeach; ?>

      <p style="color:white;">Top Courses </p>
      <hr class="footerpartision">

      <br>
      <?php foreach ($courses as $key => $value): ?>
        <p> <a href="{{ url('courses', $value->slug)}}"> {{ $value->title }}</a> </p>

      <?php endforeach; ?>

    </div>

    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <div>
        <div class="row">

          <div class="col-sm-8 col-sm-6 col-sm-4 text-center">
            <h4 class="text-center"> {{ 'Browse Books by Category' }}</h4>
            <ul class="list-inline coursestream">
              <?php foreach ($bookcats as $key => $value): ?>
                <li class="list-inline-item">
                  <a href="{{ url('books', $value->slug )}}">{!! $value->title .' | ' !!}</a>
                </li>
              <?php endforeach; ?>
            </ul>

          </div>

            <ul class="list-inline">
              @if(!empty($books) && $books->count())
              @foreach($books as $key => $value)
              <li class="list-inline-item col-sm-4"><b>Title :</b> <a href="{{ route('library.show', $value->id) }}">{{ $value->title}}</a></li>
              <li class="list-inline-item col-sm-3"><b>Auther :</b> {{ $value->author }}</li>
              <li class="list-inline-item col-sm-6"><b>ISBN:</b> {{ $value->ISBN }}</li>
              <br><br>

              @endforeach
          @else
              <li>There are no data.</li>
          @endif

            </ul>
            <br><br>
            {!! $books->render() !!}
        </div>



      </div>

    </div>
    <div class="col-sm-2 sidenav text-left">

      <div class="well">
        <p style="color:white;">Our Services</p>
        <hr class="footerpartision">
        <?php foreach ($services as $key => $value): ?>
          <p> <a href="{{ url('services', $value->slug)}}"> {{ $value->title }}</a> </p>

        <?php endforeach; ?>

      </div>
      <div class="well">
        <p style="color:white;">We Supports Admissions</p>
        <hr class="footerpartision">
        <?php foreach ($admissions as $key => $value): ?>
          <p> <a href="{{ url('admissions', $value->slug)}}"> {{ $value->title }}</a> </p>

        <?php endforeach; ?>

      </div>
      <div class="well">
        <p><a href="{{ url('/contactus') }}">Advertising</a></p>
      </div>

    </div>
  </div>
</div>


@stop

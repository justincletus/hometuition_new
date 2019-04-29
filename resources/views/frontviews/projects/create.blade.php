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
      <fieldset>
        {{ Form::open(array('route' => 'articles.store')) }}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Please fix the following errors
            </div>
        @endif

          <div class="col-sm-4 {{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title">Title :</label>
            <input type="text" name="title" value="">
            @if($errors->has('title'))
            <span class="help-block">{{ $errors->first('title') }}</span>
            @endif

          </div>
          <div class="col-sm-8">
            <label for="details">Details : </label>
            <textarea name="details" rows="6" cols="60" id="articledetails"></textarea>
            <script>
                CKEDITOR.replace('details');
            </script>

          </div>
          <input type="submit" name="create_articles" value="Create" class="btn btn-primary">
        {{ Form::close() }}

      </fieldset>

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

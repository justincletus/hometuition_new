@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav">
      <p><a href="{{url('/admission')}}">Admission</a></p>
      <p><a href="{{url('/courses')}}">Courses</a></p>
      <p><a href="{{url('/exams')}}">Examination</a></p>
      <p><a href="{{url('/library')}}">Online Library</a></p>
      <p><a href="{{url('/schools/syllabus')}}">School Syllabus</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <div class="col-sm-4">

        <div class="well">
          <form id="searchschool" action="" method="post">
              <meta name="_token" content="{{ csrf_token() }}" />
            <fieldset>
              <legend> Search Schools</legend>
              <div class="form-group">
                <label for="search" class="fa fa-search">Search Schools</label>
                <input type="text" name="searchname" id="search" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" name="getschool" value="Search" class="btn btn-primary">
              </div>

            </fieldset>

          </form>




        </div>


      </div>
      <div class="col-sm-6" id="searchresult">

      </div>
      <h2>{!! $title !!}</h2>
      <table id ="allschooldetails" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>School Name </th>
            <th>Address</th>
            <th>State/City</th>
            <th>Contact No:</th>

          </tr>
        </thead>

        <?php foreach ($schools as $school): ?>
        <tbody>
            <tr>

            <td>{{ $school->id }}</td>
            <td>{{ $school->name }}</td>
            <td>{{ $school->address }}</td>
            <td>{{ $school->state_id }}</td>
            <td>{{ $school->phone }}</td>
            </tr>

            <?php endforeach; ?>
        </tbody>

      </table>
      <div class="col-sm-4 pull-right">
        {!! $schools->render() !!}
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

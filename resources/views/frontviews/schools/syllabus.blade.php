@extends('frontviews.layouts.submaster')
@section('title', 'School Syllabus')

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
      <div class="col-sm-8">

          <div class="well">
            <form class="syllabusdetails" action="{{ url('getsyllabusdetails')}}" method="post">
              <meta name="_token" content="{{ csrf_token() }}" />
              <fieldset>
                <legend> {!! $title !!}</legend>

                <div class="form-group col-sm-4">
                  <label for="examboardsabcd">Exam Board</label>
                  <select class="form-control" id="examboardsabcd" name="examboard_id">
                    <option value="" disabled selected> Select</option>

                    <?php foreach ($examboards as $key): ?>
                      <option value= "{{ $key->id }}" >{{ $key->type }}

                    <?php endforeach; ?>

                  </select>

                </div>
                <div class="form-group col-sm-4">
                  <label for="schoolstds">Select Standard</label>
                  <select class="form-control" id='schoolstds' name="std_id">


                  </select>

                </div>
                <div class="form-group col-sm-4">
                  <label for="subjectname">Select Subject</label>
                  <select class="form-control" id="subjectname" name="subid">

                  </select>

                </div>
                <div class="" id="syllabusdetails">

                </div>
                <input type="submit" name="syllabus" value="Submit" class="btn btn-primary">


              </fieldset>
            </form>



              <div class="" id="test">

              </div>





      </div>
    </div>

    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p><a href="{{ url('/contactus') }}">Advertising</a></p>
      </div>
      <div class="well">
        <p><a href="{{ url('/schools')}}"> Top Schools in Mumbai</a> </p>
      </div>
    </div>

  </div>
</div>


@stop

<script>

</script>

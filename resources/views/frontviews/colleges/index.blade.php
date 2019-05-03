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


      </div>
      <div>
        <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3>{{ $title }}</h3>

                    <div class="panel-body">
                      <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::Label('state', 'State:') !!}
                            <select class="form-control" name="sta_id" id="sta_id">
                              <option value="" disabled selected>Select State</option>
                              @foreach($states as $state)
                                <option value="{{$state->id}}">{{ $state->sname }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-group">
                        <label for="city">City</label>
                        <select class="form-control" name="city" id="city1" style="width:300px;">

                        </select>

                      </div>
                      <div class="form-group">
                        <label for="university">University</label>
                        <select class="form-control" name="university" id="university1" style="width:300px;">

                        </select>

                      </div>
                      <div class="form-group">
                        <div class="col-sm-8" id="collegelist">

                        </div>


                      </div>

                    </div>

                  </div>

                </div>

                <div class="row">
                  <ul class="list-inline">
                    @if(!empty($colleges) && $colleges->count())
                    @foreach($colleges as $key => $value)
                    <li class="list-inline-item col-sm-4"><b>College Name :</b> <a href="{{ url('colleges', $value->slug)}}">{{ $value->name}} </a> </li>
                    <li class="list-inline-item col-sm-3"><b>Website Url :</b> <a href="{{ $value->url }}">{{ $value->url }}</a>  </li>
                    <li class="list-inline-item col-sm-6"><b>Address :</b> {{ $value->address }}</li>
                    <br><br> <br>

                    @endforeach
                @else
                    <li>There are no data.</li>
                @endif

                  </ul>
                  <br><br>

                  {!! $colleges->render() !!}
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

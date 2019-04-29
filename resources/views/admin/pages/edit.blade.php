@extends('admin.adminlayouts.submaster')
@section('title', 'Submitted Contacts')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('admin')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Edit Pages</li>
    </ol>
    <div class="col-md-6">
      @if(Session::has('message'))
      <p class="alert alert-info">{{ Session::get('message') }}</p>
      @endif
      @if ($errors->any())
      <p class="alert alert-info">{{ implode('', $errors->all(':message')) }}</p>

      @endif

    </div>
    <!-- Icon Cards-->
    <div class="row">
      <?php
            if(Auth::guest()){ ?>
                <p class="mt-5">Please <a href="/login/">login</a> to upload the doc.</p>

            <?php }
            else { ?>
              <div class="col-lg-9">
                {{ Form :: open(['route'=>['pages.update',$edit->id ],'method'=>'PUT'])}}

                  {{ csrf_field() }}
                  <fieldset>
                    <div class="form-group">
                      <label for="title"> Page Title</label>
                      <input type="text" name="title" value="{{ $edit->pagename }}" class="form-control" id="title">
                      <input type="hidden" name="uid" value="{{ Auth::id() }}">
                    </div>
                    <div class="form-group">
                      <label for="details"> Details</label>
                     {{ Form::textarea('details1', $edit->details ) }}
                     <script>
                       CKEDITOR.replace('details1');
                     </script>

                    </div>
                    <div class="submit">
                        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                    </div>


                  </fieldset>


                {{ Form::close() }}

              </div>

          <?php  } ?>

          





      </div>




    </div>
  </div>


@stop

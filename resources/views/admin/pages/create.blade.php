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
      <li class="breadcrumb-item active">Create Pages</li>
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

                <form action="{{ url('pages/store')}}" method="post">
                  {{ csrf_field() }}
                  <fieldset>
                    <div class="form-group">
                      <label for="title"> Page Title</label>
                      <input type="text" name="title" value="" class="form-control" id="title">
                      <input type="hidden" name="uid" value="{{ Auth::id() }}">
                    </div>
                    <div class="form-group">
                      <label for="details"> Details</label>
                      details : <textarea name="details" rows="8" cols="80" id="summary-ckeditor" class="form-control"></textarea>
                      <script>
                          CKEDITOR.replace('summary-ckeditor');

                      </script>

                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">Page Category</label>
                      <select id="inputState" class="form-control" name="pagecat">
                        <option selected>Choose...</option>
                        <?php foreach ($blog_cat as $key => $value): ?>
                          <option value=" {{ $value->id }} ">{{ $value->title }} </option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputsubsub">Page SubCategory</label>
                      <select id="inputsubsub" class="form-control" name="pagesubcat">
                        <option selected>Choose...</option>
                        <?php foreach ($subsubcat as $key => $value): ?>
                          <option value=" {{ $value->id }} ">{{ $value->title }} </option>
                        <?php endforeach; ?>

                      </select>
                    </div>

                    <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                  </fieldset>


                </form>

              </div>

          <?php  } ?>






      </div>




    </div>
  </div>


@stop

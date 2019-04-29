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
      <li class="breadcrumb-item active">File Uploads</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <?php
            if(Auth::guest()){ ?>
                <p class="mt-5">Please <a href="/login/">login</a> to upload the doc.</p>

            <?php }
            else { ?>

              <form action="{{url('pages/filesstore')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              Files:
              <input type="file" name="fileupload" multiple />
              <input type="hidden" name="uid" value="{{ Auth::id() }}" />

              <input type="submit" value="Upload" />

              </form>
          <?php  } ?>

          <div class="col-sm-9">

            <?php print_r($title); ?>



          </div>



      </div>


    </div>
  </div>


@stop

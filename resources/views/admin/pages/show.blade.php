@extends('admin.adminlayouts.submaster')
@section('title', 'OnlineTutor Pages')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('admin')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Basic Pages</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-lg-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif

      </div>
      <p> <a href="{{ route('pages.index')}}">Back</a> </p>
      <div class="col-md-9">

        <h3>Page Title: {{ $page->pagename }}</h3>

        <p>{{ $page->created_at }}</p>
        <hr>
        <h3>Details</h3>
        <div class="col-lg-9">
          {!! $page->details !!}

        </div>



      </div>
      </div>

    </div>
  </div>
</div>

@stop

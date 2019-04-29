@extends('admin.adminlayouts.submaster')
@section('title', 'Submitted Contacts')
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">File Details</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-lg-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif

      </div>

      <div class="col-lg-12">

        <table id="filedetailsdb" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>File Name</th>
            <th>Owner</th>
            <th>Created At</th>
            <th>Action </th>
          </tr>
         </thead>
         <tbody>
           @foreach ($files as $file)
            <tr id="file{{$file->id}}">
             <td>{{$file->id}}</td>
             <td>{{$file->filename}}</td>
             <td>{{$file->uid}}</td>
             <td>{{ date('M-j-Y', strtotime($file->created_at)) }}</td>
             <td><a href="#"><i class="fa fa-folder-eye">View</i></a></td>

            </tr>
            @endforeach
        </tbody>
        </table>

      </div>

    </div>
  </div>
</div>

@stop

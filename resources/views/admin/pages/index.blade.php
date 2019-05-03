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
      <div class="col-md-9">
        <h2> All page details</h2>
        <p data-placement="top" data-toggle="tooltip" title="add" class="pull-right"><a href="{{ route('pages.create')}}"><span class="fa fa-plus"></span>Add New</a></p>
        <table id ="allbasicpages" class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Page Name </th>
              <th>Created On</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php foreach ($pages as $page): ?>
          <tbody>
              <tr id="page{{$page->id}}">

              <td>{{ $page->id }}</td>
              <td>{{ $page->pagename}}</td>
              <td>{{ $page->created_at }}</td>
              <td colspan="2">
                  <p data-placement="top" data-toggle="tooltip" title="View"> <a href="{{ route('pages.show', $page->slug) }}"><span class="fa fa-eye"><span></a></p>
                </td>
                <td><p data-placement="top" data-toggle="tooltip" title="edit"><a href="{{ route('pages.edit', $page->id) }}"><span class="fa fa-pencil"><span></a>
                </p>
              </td>

              <td>

                {{ Form::open(['route'=>['pages.destroy',$page->id],'method'=>'delete', 'style'=>'display:inline'])}}
                {{method_field('DELETE')}}
                <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" ><span class="fa fa-fw fa-trash"></span></button></p>
                {{ Form::close()}}

                </td>
              </tr>

              <?php endforeach; ?>
          </tbody>

        </table>

      </div>


      </div>

    </div>
  </div>
</div>

@stop

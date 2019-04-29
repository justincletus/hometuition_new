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
      <li class="breadcrumb-item active">Articles</li>
    </ol>
    <!-- Icon Cards-->
      <div class="row">

        <div class="blog-post">
          <p class="pull-right"> <a href="{{ route('articles.index') }}">back </a> </p>
            <h2 class="blog-post-title">
                <a href="articles/{{ $article->slug }}">{{ $article->title }}</a>
            </h2>

            <p class="small">{{ 'Last Updated At: ' .$article->updated_at }} </p>
            <hr>
            <p> {!! $article->details !!} </p>


        </div>


      </div>

  </div>


</div>
@stop

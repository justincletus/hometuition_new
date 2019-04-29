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
        <div class="col-sm-8 col-sm-6 col-sm-4 pull-right addarticles">
          <p><a href="{{ route('articles.create') }}"><span class="fa fa-plus"></span>Add New </a> </p>

        </div>
        @if(!empty($articles) && $articles->count())
        <table class="table">
          <h4> List of Articles</h4>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Page Name</th>
            <th scope="col">Article Category</th>
            <th scope="col">Update At</th>
            <th colspan="3"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($articles as $article)
          <tr>
            <td>{{ $article->id }}</td>
            <td><a href="articles/{{ $article->slug }}">{{ $article->title }}</a> </td>

            <td>{{ $article->updated_at }}</td>
            <td>
              <a href="{{ route('articles.show',$article->slug) }}" class="btn btn-success">
                <span class="fa fa-eye"></span></a>
                <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-info">
                  <span class="fa fa-pencil"></span></a>

                  {{ Form::open(['route'=>['articles.destroy',$article->id],'method'=>'delete', 'style'=>'display:inline'])}}
                  {{method_field('DELETE')}}
                  <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" ><span class="fa fa-fw fa-trash"></span></button></p>
                  {{ Form::close()}}



          </td>
          </tr>
          @endforeach
        </tbody>

      </table>
      @else
          <p>No post added yet!</p>
      @endif

      <div class="articles-pagination">
        {!! $articles->render() !!}

      </div>



      </div>

  </div>


</div>
@stop

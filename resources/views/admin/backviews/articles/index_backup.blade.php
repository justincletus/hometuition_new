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

        @if( $articles->count() )
            @foreach( $articles as $article )

                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <a href="/articles/{{ $post->post_slug }}">{{ $article->title }}</a>
                    </h2>
                    <p class="blog-post-meta">{{ date('M j, Y', strtotime( $post->created_at )) }} by <a href="#">{{ $post->author_ID }}</a></p>

                    <div class="blog-content">
                        {!! nl2br( $post->post_content ) !!}
                    </div>
                </div>

            @endforeach
        @else

            <p>No post added yet!</p>

        @endif

        {{-- Display pagination only if more than the required pagination --}}
        @if( $posts->total() > 6 )
            <nav>
                <ul class="pager">
                    @if( $posts->firstItem() > 1 )
                        <li><a href="{{ $posts->previousPageUrl() }}">Previous</a></li>
                    @endif

                    @if( $posts->lastItem() < $posts->total() )
                        <li><a href="{{ $posts->nextPageUrl() }}">Next</a></li>
                    @endif
                </ul>
            </nav>
        @endif


      </div>



  </div>


</div>
@stop

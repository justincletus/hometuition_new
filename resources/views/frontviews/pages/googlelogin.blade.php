@extends('frontviews.layouts.submaster')

@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="userloginform row">
      <header>
            <h1>{{ env('APP_TITLE') }}</h1>
        </header>
      <div class="col-md-8 col-md-offset-2">
      <form method="GET" action="/google/login">
          <button class="button-primary">Login with Google</button>
      </form>
    </div>
  </div>
</div>
@stop

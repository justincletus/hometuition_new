@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav">

      <?php foreach ($services as $key => $value): ?>
        <p class="text-left"> <a href="{{ url('services', $value->slug) }}">{{ $value->title }} </a> </p>

      <?php endforeach; ?>
    </div>
    <div class="col-sm-8 text-left">
        {!! Breadcrumbs::render('home') !!}
      <div class="col-md-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <!-- Portfolio Grid -->
      <section class="bg-light" id="portfolio">
        <div class="container">

          <div class="row">
            <div id="portfolio-list" style="display:contents;">

              <?php foreach ($services as $key): ?>
                <div class="portfolio-item col-xs-12 col-sm-6 col-sm-4">
                  <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                    <div class="portfolio-hover">
                      <div class="portfolio-hover-content">
                        <i class="fa fa-plus fa-3x"></i>
                      </div>
                    </div>
                    <img class="img-fluid rounded mx-auto d-block img-thumbnail" src=" {{ asset('logo.png') }} " alt="Online Tutor Mumbai" />
                  </a>
                  <div class="portfolio-caption">
                    <p><a href="{{route('services.show',$key->slug)}}"> {{ $key->title }} </a></p>

                  </div>
                </div>
              <?php endforeach; ?>
            </div>

          </div>
        </div>
      </section>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>


@stop

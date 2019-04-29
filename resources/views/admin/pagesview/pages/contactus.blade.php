@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
<div class="container-fluid text-center">
  <div class="row content userloginform">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <div class="col-sm-6">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
      </div>
      <div class="col-sm-6">
        <h2> Contact Address</h2>
        <address class="siteaddress">
          <p>Online Tutor Mumbai</p>
          <p>Today Grande Vista</p>
          <p>#602 Plot-3,Sector-10B,</p>
          <p>Ulwe Node, Navi Mumbai, India</p>
          <p><i class="fa fa-envelope-open"></i>Email: info@onlinetutormumbai.online or onlinetutormumbai@gmail.com</p>
          <p><i class="fa fa-chrome"></i><a href="http://onlinetutormumbai.online">http://onlinetutormumbai.online</a></p>
        </address>
      </div>
      <div class="col-sm-9">
        <h2> Feedback/Support Contact Form</h2>
        <form id="contact-form" method="post" action="/contacts" role="form">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

          <div class="controls">

              <div class="row">

                      <div class="form-group">
                          <label for="form_name">Firstname *</label>
                          <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                          <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                          <label for="form_lastname">Lastname *</label>
                          <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                          <div class="help-block with-errors"></div>
                      </div>
                </div>
                <div class="row">

                      <div class="form-group">
                          <label for="form_email">Email *</label>
                          <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                          <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                          <label for="form_phone">Phone</label>
                          <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                          <div class="help-block with-errors"></div>
                      </div>
                    </div>
                    <div>
                      <div class="form-group">
                          <label for="form_message">Message *</label>
                          <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                          <div class="help-block with-errors"></div>
                      </div>
                  </div

              </div>
              <div class="form-group">
                  <input type="submit" class="btn btn-success btn-send" value="Send message">
              </div>


          </div>

      </form>
      </div>
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

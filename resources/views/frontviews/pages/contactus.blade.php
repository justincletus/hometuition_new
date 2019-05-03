@extends('frontviews.layouts.submaster')
@section('title', 'Services')

@section('content')
    <div class="container-fluid text-center">
        <div class="row content userloginform">
            <div class="col-sm-2 sidenav">
                <p><a href="{{url('/admission')}}">Admission</a></p>
                <p><a href="{{url('/courses')}}">Courses</a></p>
                <p><a href="{{url('/exam')}}">Examination</a></p>
            </div>
            <div class="col-sm-8 text-left">
                <div class="col-sm-4">
                    @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                </div>
                <div class="row" id="contact-page">

                    <div class="col-sm-6 col-sm-4">

                        <h4> Contact Address</h4>
                        <address class="siteaddress">
                            <p>Home Tuition Bangalore</p>
                            <p>Srinidhi Enclave</p>
                            <p>#B-G4, Kammanahalli Gottigeri</p>
                            <p>Bannerghata Road, Bangalore</p>
                            <p><i class="fa fa-envelope-open "></i> Email : info@hometuitionbangalore.online</p>
                            <p><i class="fa fa-chrome "></i><a href="http://hometuitionbangalore.online">
                                    hometuitionbangalore.online</a></p>
                            <p><i class="fa fa-phone-square "></i> Contact Number : +91-8779055740</p>
                        </address>

                        </li>
                    </div>
                    <div class="col-sm-6 col-sm-4">

                        <fieldset>
                            <h4> Feedback/Support Contact Form</h4>
                            <form id="" method="post" action="/contacts" role="form">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                <div class="controls">

                                    <div class="row">

                                        <div class="form-group">
                                            <label for="form_name">Firstname *</label>
                                            <input id="form_name" type="text" name="name" class="form-control"
                                                   placeholder="Enter firstname *" required="required"
                                                   data-error="Firstname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form_lastname">Lastname *</label>
                                            <input id="form_lastname" type="text" name="surname" class="form-control"
                                                   placeholder="Enter lastname *" required="required"
                                                   data-error="Lastname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group">
                                            <label for="form_email">Email *</label>
                                            <input id="form_email" type="email" name="email" class="form-control"
                                                   placeholder="Enter email *" required="required"
                                                   data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form_phone">Phone</label>
                                            <input id="form_phone" type="tel" name="phone" class="form-control"
                                                   placeholder="Enter phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="form_message">Message *</label>
                                                <textarea id="form_message" name="message" class="form-control"
                                                          placeholder="Message for me *" rows="4" required="required"
                                                          data-error="Please,leave us a message."></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success btn-send" value="Send message">
                                    </div>

                            </form>

                        </fieldset>


                    </div>

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

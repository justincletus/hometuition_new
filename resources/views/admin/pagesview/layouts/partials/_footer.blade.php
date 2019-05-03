<!-- Contact -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center" style="color:aqua">Online Tutor Contact Us Form</h2>
        <form id="contact-form" method="post" action="/contacts" role="form">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

          <div class="messages"></div>

          <div class="controls">

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="form_name">Firstname *</label>
                          <input id="form_name" type="text" name="firstname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="form_lastname">Lastname *</label>
                          <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="form_email">Email *</label>
                          <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="form_phone">Phone</label>
                          <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="form_message">Message *</label>
                          <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-send" value="Send message">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <p class="text-muted"><strong>*</strong> These fields are required.</p>
                  </div>
              </div>
          </div>

      </form>
      </div>
    </section>

<!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Online Tutor Mumbai {{ date('Y') }}</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

<!-- jQuery -->
    <script src="{{asset ('js/jquery-3.3.1.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset ('js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    <!-- Contact Form JavaScript -->
    <script src="{{asset ('js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset ('js/contact_me.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset ('js/agency.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js">

    </script>

  </body>
</html>

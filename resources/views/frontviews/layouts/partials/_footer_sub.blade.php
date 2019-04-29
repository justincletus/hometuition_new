<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-3 col">
      <p><a href="{{ url('/projects')}}">Projects</a> </p>
      <p><a href="{{ url('/articles')}}">Blogs</a> </p>
      <p><a href="{{ url('/university')}}">Smart University</a> </p>
      <p><a href="{{ url('/articles')}}">Conferences</a> </p>
      <p><a href="{{ url('/articles')}}">Online Courses</a> </p>
      <hr class="footerpartision"><br>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col">
        <p><a href="{{ url('/contactus')}}">Contact Us</a> </p>
        <p><a href="{{ url('/schools/syllabus')}}">School Syllabus</a> </p>
        <p><a href="{{ url('/colleges')}}">College Syllabus</a> </p>
        <p><a href="{{ url('/library')}}">College Projects</a> </p>
        <p><a href="{{ url('/articles')}}">White pages</a> </p>
        <hr class="footerpartision"><br>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col">
        <p> <a href="#"> Google Cloud Platform</a>  </p>
        <p> <a href="#"> Cloud Migration Supports</a>  </p>
        <p> <a href="#"> Aws Cloud Supports</a>  </p>
        <p> <a href="#"> SEO Marketing Campaign</a>  </p>
        <p> <a href="{{ url('/books')}}"> Ebooks and Latex Supports</a>  </p>
        <hr class="footerpartision"><br>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-3 col">
        <p><a href="{{ url('/library')}}">Online Library</a> </p>
        <p> <a href="#"> Website build and Hosting</a>  </p>
      </div>
    </div>
  </div>
</div>


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
                      @include('components.share', ['url' => 'http://onlinetutormumbai.online/'])
                    </li>
                    <li class="list-inline-item">
                      @include('components.googleplus', ['url' => 'http://onlinetutormumbai.online/'])
                    </li>
                    <li class="list-inline-item">
                      @include('components.twitter', ['url' => 'http://onlinetutormumbai.online/'])
                    </li>

                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-inline quicklinks">
                    <li class="list-inline-item">
                      <a href="#">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="http://megachipstechnology.in">Power by Mega Chips Technology</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>



<!-- jQuery -->


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
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('js/codesnippettest.js')}}"></script>

    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script>

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-buttons > a', function(e){

            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
  </body>
</html>

@extends('frontviews.layouts.master')

@section('content')


    <div class="content">
        <div class="col-md-6">
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
        </div>
        <div class="col-md-6">


        </div>

        <!-- Services -->
        <section id="services">
            <div class="container">
                <div class="container" style="padding-top:60px;">
                    <div class="col-lg-12 col-md-6 col-md-4 jumbotron jumbotron-billboard text-center">
                        <div class="img img-fluid">

                        </div>
                        <h2 class="section-heading text-uppercase"><a href="{{ url('/university') }}">Smart
                                University</a></h2>
                        <p class="section-subheading text-muted">Online tutor is the process of teaching subjects in an
                            online, virtual environment or networked environment in which teachers and learners are
                            connected with each other. </p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-graduation-cap fa-stack-1x fa-inverse"></i>
            </span>
                        <h4 class="service-heading"><a href="#">Student Registration</a></h4>
                        <p class="text-muted">A student is a learner,"student" is also used to refer to someone who is
                            learning a topic or who is "a student of" a certain topic or person. In the widest sense of
                            the word, a student is anyone seeking to learn or to grow by experience.</p>
                    </div>
                    <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-university fa-stack-1x fa-inverse"></i>
            </span>
                        <h4 class="service-heading"><a href="#">Tutor Registration</a></h4>
                        <p class="text-muted">A tutor is a person who provides assistance, As a teaching-learning
                            method, tutoring is characterized by how it differs from formal teaching methods on the
                            basis of the (in)formality of the setting as well as the flexibility in pedagogical methods
                            in terms of duration, pace of teaching and evaluation.</p>
                    </div>
                    <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-book fa-stack-1x fa-inverse"></i>
            </span>
                        <h4 class="service-heading"><a href="{{ url('/library') }}">Online Resource</a></h4>
                        <p class="text-muted">The Enhancing Student Mobility through Online Support (ESMOS) project is a
                            European-funded partnership between higher education institutions from Austria, Bulgaria,
                            Italy, Lithuania and the United Kingdom. </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Grid -->
        <section class="bg-light" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-sm-4 text-center">
                        <h2 class="section-heading text-uppercase">
                            <small>Smart University Supports</small>
                        </h2>
                        <h3 class="section-subheading text-muted">Learning management systems or Virtual Learning
                            Environments.It has the aims of developing, evaluating and modelling the use of Virtual
                            Learning Environments and online technologies to support students who take part in either a
                            study exchange (ERASMUS) or work placement programme (LEONARDO), spending part of their
                            studies overseas.</h3>
                    </div>
                </div>
                <div class="row">
                    @isset($support)
                    <div id="portfolio-list" style="display:contents;">

                        <?php foreach ($support as $key): ?>
                        <div class="portfolio-item col-xs-12 col-sm-6 col-md-4">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                <img class="img-fluid" src="/img/portfolio/{{ $key->image }}"
                                     alt="Online Tutor Mumbai"/>
                            </a>
                            <div class="portfolio-caption">
                                <p><a href="{{route('supports.show',$key->slug)}}"> {{ $key->name }} </a></p>

                            </div>
                        </div>
                        <?php endforeach; ?>
                        @endisset
                    </div>

                </div>
            </div>
        </section>

        <!-- About -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">About Us</h2>
                        @isset($pages)
                        <h3 class="section-subheading text-muted">{{ $pages->details }}</h3>
                        @endisset

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{ asset('img/logos/aicte.jpeg')}}"
                                         alt="Online Tutor Mumbai-Aicte">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>2009-2011</h4>
                                        <h4 class="subheading">AICTE Support</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">All India Council for Technical Education (AICTE) was set
                                            up in November 1945 as a national-level Apex Advisory Body to conduct a
                                            survey on the facilities available for technical education and to promote
                                            development in the country in a coordinated and integrated manner</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{ asset('img/logos/ugc_mod_logo.jpg')}}"
                                         alt="Online Tutor Mumbai-UGC">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>March 2011</h4>
                                        <h4 class="subheading">UGC Support</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">The University Grants Commission (UGC) came into existence
                                            on 28th December, 1953 and became a statutory Organization of the Government
                                            of India by an Act of Parliament in 1956, for the coordination,determination
                                            and maintenance of standards of teaching, examination and research in
                                            university education.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{ asset('img/logos/iit-bombai.png')}}"
                                         alt="Online Tutor Mumbai-IIT">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>December 2012</h4>
                                        <h4 class="subheading">IIT Support</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Upcoming Scheme - National Doctoral Fellowship</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{ asset('img/logos/tutor_logo.png')}}"
                                         alt="Online Tutor Mumbai">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>July 2017</h4>
                                        <h4 class="subheading">Online Education in India</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Online education in India has been on an upward swing in
                                            the last few years and the trend is expected to continue in 2017 as well -
                                            maybe at a much accelerated pace. There is an ever-growing population of
                                            education-hungry students & professionals in India that is going online.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <h4>Be Part
                                        <br>Of Our
                                        <br>Story!</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section class="bg-light" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                        <h3 class="section-subheading text-muted">OnlineTutorMumbai Supports.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
                            <h4>Kay Garland</h4>
                            <p class="text-muted">Lead Designer</p>
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
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Marketer</p>
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
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/team/gadu_gabi.png" alt="OnlineTutor">
                            <h4>GaduGabi Justin</h4>
                            <p class="text-muted">Lead Developer</p>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="large text-muted">Online education industry will be a $1.96 billion industry by 2021
                            according to a research conducted by KPMG, along with with insights from Google search. The
                            report finds that the paid user base will grow 6X from 1.6 million users in 2016 to 9.6
                            million users in 2021. </p>

                    </div>
                </div>
            </div>
        </section>

        <!-- Clients -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="img/logos/aicte.jpeg"
                                 alt="AICTE India-Online Tutor">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="img/logos/ugc_mod_logo.jpg" alt="UGC">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="img/logos/icse-logo.jpg" alt="ICSC">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="img/logos/mumbai-university-admission.jpg"
                                 alt="Mumbai University">
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css"  type="text/css">
    <!-- aos CSS -->
    <link href="{{asset('assets')}}/css/aos.css" rel="stylesheet" type="text/css">

    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/all.min.css" type="text/css">
    <!-- style CSS -->
    <link href="{{asset('assets')}}/css/sessions.css" rel="stylesheet" type="text/css">

    <title>Fatherhood Sessions</title>
    <link rel="icon" type="image/ico" href="{{asset('assets')}}/img/TB--img.png" />
</head>
<body>
        <header id="nav">
                <nav id="navbar" class="navbar navbar-expand-lg navbar-light position-fixed">
                    <div class="container">
                        <a class="navbar-brand" href="{{route('en.home.index')}}">
                            <img class="logo" src="{{asset('assets')}}/img/logo-white.png" alt="logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav nav-pills ml-auto justify-content-end">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index')}}#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index')}}#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('en.home.index')}}#vision">Vision</a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{route('en.home.index')}}#events">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index')}}#testimonials">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index')}}#media">Media</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index')}}#mother">mother</a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{route('en.home.index')}}#team">Team</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index')}}#contacts">Contacts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="ar/sessions-ar.html">عربي</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </nav>
            </header>

            <section id="title">
                <div class="container text-center" >
                    <h1 data-aos="zoom-out" data-aos-delay="0" data-aos-duration="1000">Fatherhood Sessions</h1>

                </div>

            </section>
            <section id="desc">
                    <div class="container text-center"  >
                            <p data-aos="zoom-in" data-aos-delay="0" data-aos-duration="1000">{!! strip_tags($session->long_description) !!}</p>
                    </div>
            </section>
            <section id="clients">
                <div class="container">
                <h2 data-aos="flip-down" data-aos-delay="0" data-aos-duration="1000">Corporare & Schools :</h2>
                    <div class=" row pics justify-content-center">
                        <div class="col-12" >
                          <ul >
                              @foreach ($session_images as $image)
                                <li class="" data-aos="zoom-in" data-aos-delay="450" data-aos-duration="1000"><img src="{{asset('') . $image->link}}" alt=""></li>
                              @endforeach
                         </ul>
                        </div>
                    </div><!--end row-->
                </div>
            </section>
            <footer>
                <p class="text-center">Made with <i class="fas fa-heart"></i> by <span>TWNAFEG</span> © 2019. All rights reserved.</p>
                <ul class="text-center">
                    <li><a href="#home">home</a></li>
                    <li><a href="#about">about</a></li>
                    <li><a href="#vision">vision</a></li>
                    <li><a href="#events" >events</a></li>
                    <li><a href="#team">team</a></li>
                    <li><a href="#test">Testimonials</a></li>
                    <li><a href="#media">Media</a></li>
                    <li><a href="#mother">mother</a></li>
                    <li><a href="#events" >events</a></li>
                    <li><a href="#contacts">contacts</a></li>
                </ul>
            </footer>


     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('assets')}}/js/popper.min.js" ></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js" ></script>

    <!-- AOS JavaScript -->
    <script src="{{asset('assets')}}/js/aos.js" ></script>
    <!-- nicescroll JS -->
    <script src="{{asset('assets')}}/js/jquery.nicescroll.min.js"></script>

    <script src="{{asset('assets')}}/js/past-events.js" ></script>
    <script>
            $(window).on('scroll',function () {
            var scrollDistance = $(window).scrollTop();
                if (scrollDistance > 100) {
                    $('header .navbar').addClass('navNew')
                    $('.logo').attr('src','{{asset('assets')}}/img/logo.png');
                }else{
                    $('header .navbar').removeClass('navNew')
                    $('.logo').attr('src','{{asset('assets')}}/img/logo-white.png');
                }

            })

            </script>

</body>
</html>

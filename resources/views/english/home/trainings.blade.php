<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css"  type="text/css">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/all.min.css" type="text/css">
    <!-- fancybox CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/jquery.fancybox.min.css" />
    <!-- aos CSS -->
    <link href="{{asset('assets')}}/css/aos.css" rel="stylesheet">


    <!-- style CSS -->
    <link href="{{asset('assets')}}/css/training.css" rel="stylesheet" type="text/css">

    <title>Fatherhood Training</title>
    <link rel="icon" type="image/ico" href="{{asset('assets')}}/img/TB--img.png" />
</head>
<body>
        <header id="nav">
                <nav id="navbar" class="navbar navbar-expand-lg navbar-light position-fixed">
                    <div class="container">
                        <a class="navbar-brand" href="{{route('en.home.index', [app()->getLocale()])}}">
                            <img class="logo" src="{{asset('assets')}}/img/logo-white.png" alt="logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav nav-pills ml-auto justify-content-end">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index', [app()->getLocale()])}}#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index', [app()->getLocale()])}}#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('en.home.index', [app()->getLocale()])}}#vision">Vision</a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{route('en.home.index', [app()->getLocale()])}}#events">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index', [app()->getLocale()])}}#testimonials">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index', [app()->getLocale()])}}#media">Media</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index', [app()->getLocale()])}}#mother">mother</a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="{{route('en.home.index', [app()->getLocale()])}}#team">Team</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('en.home.index', [app()->getLocale()])}}#contacts">Contacts</a>
                                    </li>
                                    <li class="nav-item">
                                        @if(app()->getLocale() == 'en')
                                            <a class="nav-link" href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), 'ar') }}">عربي</a>
                                        @elseif(app()->getLocale() == 'ar')
                                            <a class="nav-link" href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), 'en') }}">English</a>
                                        @endif
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </nav>
            </header>

            <section id="title">
                <div class="container text-center" >
                    <h1 data-aos="zoom-out" data-aos-delay="0" data-aos-duration="1000">Fatherhood Training</h1>
                </div>

            </section>
            <section id="desc">
                    <div class="container text-center ">
                            <p data-aos="zoom-in" data-aos-delay="0" data-aos-duration="1000">
                                {!! strip_tags($training->long_description) !!}
                            </p>
                    </div>
            </section>
            <section id="pics">
                <div class="container">

                        <div class = "grid" data-aos="zoom-in" data-aos-delay="0" data-aos-duration="1000">
                            <div class="grid-sizer"></div>
                                @foreach ($training_images as $image)
                                    <div class = "grid-item">
                                        <a  href="{{asset('') . $image->link}}" data-fancybox="gallery">
                                            <img src = "{{asset('' . $image->link)}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>



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
     <!-- nicescroll JS -->
     <script src="{{asset('assets')}}/js/jquery.nicescroll.min.js"></script>

    <!-- gallery JS -->
    <script src='https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.js'></script>
    <script src='https://imagesloaded.desandro.com/imagesloaded.pkgd.js'></script>

     <!-- AOS JavaScript -->
     <script src="{{asset('assets')}}/js/aos.js"></script>


    <!-- fancybox JS -->
    <script src="{{asset('assets')}}/js/jquery.fancybox.min.js"></script>


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

<!DOCTYPE html>
<html>
<head>
     <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- googlefonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Tajawal" rel="stylesheet">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/all.min.css" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css"  type="text/css">

    <!-- swiper slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>

    <!-- aos CSS -->
    <link href="{{asset('assets')}}/css/aos.css" rel="stylesheet">

    <!-- izimodal CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/iziModal.min.css">
  <!-- popup massage CSS -->
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>


     <!-- style CSS -->
     <link href="{{asset('assets')}}/css/style.css" rel="stylesheet" type="text/css">

    <title>{{websiteTitlte()}}</title>
    <link rel="icon" type="image/ico" href="{{asset('') . fav()->link}}" />
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="500">


    <!-- Header -->
    @include('english.layouts.header')
    <!--/ Header -->

    <!-- Main Content -->
    @yield('content')
    <!--/ Main Content -->

    <!-- Footer -->
    @include('english.layouts.footer')
    <!--/ Footer -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('assets')}}/js/popper.min.js" ></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js" ></script>

    <!-- Swiper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>

    <!-- AOS JavaScript -->
    <script src="{{asset('assets')}}/js/aos.js"></script>
    <!-- bigtext JS -->
    <script src="{{asset('assets')}}/js/bigtext.js"></script>
    <!-- nicescroll JS -->
    <script src="{{asset('assets')}}/js/jquery.nicescroll.min.js"></script>
   <!-- WEB-ANIMTIONS JS -->
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.2.2/web-animations.min.js'></script> -->

    <!-- izimodal JS -->
    <script src="{{asset('assets')}}/js/iziModal.min.js"></script>

      <!-- popup massage -->
     <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>




    <!-- script JavaScript -->
    <script src="{{asset('assets')}}/js/script.js"></script>

</body>
</html>

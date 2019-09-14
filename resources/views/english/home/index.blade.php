@extends('english.layouts.master')

@section('content')

    @include('english.home.slider')

    <section id="about">
        <div class="container text-center section">
            <div class="row">
                <div id="bigtext" class="col-lg-4 col-md-6 col-sm-12 start-title" data-aos="flip-left" data-aos-duration="2000">
                        <div>How</div>
                        <div>it all</div>
                        <div>started</div>

                </div>
                <div class="col-lg-8 col-md-6 col-sm-12" >
                        <p class="text-start " data-aos="flip-right" data-aos-duration="2000">
                            {!!strip_tags($website_text->how_it_started)!!}
                        </p>
                </div>

            </div>

            <div class="col-12 quote "data-aos="zoom-in" data-aos-duration="1000">
                    <p>"{!!strip_tags($website_text->quote1)!!}"</p>
            </div>
        </div>
        <div class="row egypt-bg">
            <div class="container">
                <div class=" col-12 eg-text " data-aos="zoom-in" data-aos-duration="1000">
                    <h3 data-aos="zoom-in-up" data-aos-delay="500" data-aos-duration="1000">.. And then in Egypt:</h3>
                    <p class="text-center egypt" data-aos-delay="500" data-aos="zoom-in-down" data-aos-duration="1000">
                            {!!strip_tags($website_text->then_in_egypt)!!}
                    </p>
                </div>

            </div>
        </div>

        <div class="container">
                <div class="col-12 text-center quote " data-aos="zoom-in" data-aos-duration="1000">
                    <p><q>{!!strip_tags($website_text->quote2)!!}</q></p>
                </div>
        </div>
        <div class="wrapper-c" >
            <div class="container">
                <div class="box "data-aos="zoom-in-right"  data-aos-duration="1000"></div>
                <div class="box" data-aos="zoom-in-left" data-aos-delay="100" data-aos-duration="1000"></div>
                <div class="box" data-aos="zoom-in-up" data-aos-delay="300" data-aos-duration="1000"></div>
                <div class="box" data-aos="zoom-in-down" data-aos-delay="400" data-aos-duration="1000"></div>
                <div class="box"data-aos="zoom-in-up" data-aos-delay="500" data-aos-duration="1000"></div>

                <div class="row camps">
                    <div class="col-12">
                        <h3 data-aos="fade-up-left" data-aos-delay="600" data-aos-duration="1000">TWNAF Father & Child camps:</h3>
                        <p class="text-center " data-aos="fade-down-right" data-aos-delay="600" data-aos-duration="1000">
                            {!!strip_tags($website_text->camps_description)!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row world" data-aos="zoom-out"  data-aos-duration="1000">
                <div class="col-12">
                    <h3 data-aos="zoom-in-down" data-aos-delay="500" data-aos-duration="5000">Internationally today:</h3>
                    <p class="text-center ww" data-aos="zoom-in-up" data-aos-delay="500" data-aos-duration="1000">
                        {!!strip_tags($website_text->internationally_today)!!}
                    </p>


                </div>
            </div>
        </div>
    </section>

    <section id="vision">
        <div class="container ">
            <div class="row v-text">
                <h3 data-aos="fade-up-left"  data-aos-duration="1000">Our Vision</h3>
                <p class="text-center" data-aos="fade-down-right"  data-aos-duration="1000">{!!strip_tags($website_text->vision)!!}</p>
            </div>
        </div>
    </section>

    <section id="events">
        <div class="container justify-content-center">
            <div class="row upcoming">
                <div class="container">
                    <h1 class="text-center title" data-aos="zoom-in" data-aos-duration="1000">Our Events</h1>
                    <div class=" justify-content-center underline" data-aos="zoom-in" data-aos-duration="1000"></div>
                    <h1 data-aos="fade-up" data-aos-duration="1000">Upcoming Events</h1>
                @foreach ($events as $event)
                    <div class="wrapper col-lg-4 col-md-12">
                        <figure class="snip1527 ">
                                <div class="image"><img src="{{asset('') . $event->image->link}}" alt="pr-sample23" /></div>
                                <figcaption>
                                <div class="date"><span class="day">{{$event->home_date_days}}</span><span class="month">{{$event->home_date_month}}</span></div>
                                <h3>{{$event->title}}</h3>
                                <p>
                                    {!! strip_tags($event->description) !!}
                                </p>


                                </figcaption>
                            <a href="" class="r-info event-modal-{{$event->id}}" data-izimodal-open="#modal-{{$event->id}}" data-izimodal-transitionin="fadeInDown" ></a>
                        </figure>

                    </div>

                @endforeach
                </div>

                @foreach ($events as $event)
                    <div id="modal-{{$event->id}}"  class="modal">
                        <div class="modal-wrapper">
                                <div class="modal-img">
                                    <img src="{{asset('') . $event->image->link}}" alt="">
                                </div>
                                <div class="modal-content">
                                        <h3>{{$event->title}}</h2>

                                        <p>{!! strip_tags($event->long_description) !!}</p>
                                        <p><b>Date:</b> {{$event->date_text}}</p>
                                        <p><b>Place:</b> {{$event->place}}<a href="{{$event->map}}">Get directions</a> </p>
                                        <p><b>price:</b> {{$event->price}}</p>
                                        <a href="{{route('en.events.index', [$event->slug])}}" target="_blank" class="modal-button">Register Now</a>
                                </div>
                        </div>
                    </div>

                @endforeach
                <!--  ----------------------------------------------------------------------  -->

            </div>

                <div class="row past ">
                    <h1 class="col-12" data-aos="fade-left"  data-aos-duration="1000">Past Events</h1>
                    <div class="wrapper col-lg-4 " data-aos="fade-right" data-aos-duration="1000">
                        <figure class="snip1543">
                            <!-- 383px*278px img -->
                            <img src="{{asset('assets')}}/img/outer-training.jpg" alt="sample108" />
                                <figcaption>
                                    <h3>Fatherhood training</h3>
                                    <p>{!! strip_tags($training->short_description) !!}</p>
                                </figcaption>
                                <a href="{{route('en.home.trainings')}}"></a>
                        </figure>
                    </div>
                    <div class="wrapper col-lg-4"  data-aos="fade-up" data-aos-duration="1000">
                        <figure class="snip1543">
                            <!-- 383px*278px img -->
                            <img src="{{asset('assets')}}/img/outer-session.jpg" alt="sample108" />
                                <figcaption>
                                    <h3>Fatherhood sessions</h3>
                                    <p>{!! strip_tags($session->short_description) !!}</p>
                                </figcaption>
                                <a href="{{route('en.home.sessions')}}"></a>
                        </figure>
                    </div>
                    <div class="wrapper col-lg-4 "data-aos="fade-left" data-aos-duration="1000">
                        <figure class="snip1543">
                            <!-- 383px*278px img -->
                            <img src="{{asset('assets')}}/img/outer-camps.jpg" alt="sample108" />
                                <figcaption>
                                    <h3>Father & Child camps</h3>
                                    <p>{!! strip_tags($camp->short_description) !!}</p>
                                </figcaption>
                                <a href="{{route('en.home.camps')}}"></a>
                        </figure>
                    </div>

                </div>
        </div>


    </section>

    <div class="container">
            <div class="col-12 text-center quote " data-aos="zoom-in" data-aos-duration="1000">
                    <p><q>{!!strip_tags($website_text->quote3)!!}</q></p>
            </div>
    </div>

    <section id="testimonials" class="testim">
            <div class="container text-center">
                <h1 data-aos="flip-down" data-aos-duration="1000">Testimonials</h1>
                <div class="swiper-container" data-aos="flip-up" data-aos-duration="1000">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <p>{!! strip_tags($testimonial->text) !!}</p>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"><i class="fas fa-chevron-right fa-3x"></i></div>
                <div class="swiper-button-prev"><i class="fas fa-chevron-left fa-3x"></i></div>
                </div>
            </div>

    </section>

    <section  id="media">
        <div class="container">
            <h1 class="text-center title" data-aos="zoom-in" data-aos-duration="1000">What media said about us </h1>
            <div class=" justify-content-center underline" data-aos="zoom-in" data-aos-duration="1000"></div>
            <div class="row blogs" >
                    @foreach ($news->forPage(1,3) as $single)
                        <div class="col-md-4" data-aos="fade-
                            @if($loop->index == 0)right
                            @elseif($loop->index == 1)up
                            @elseif($loop->index ==2)left
                            @endif
                            " data-aos-duration="1000">
                            <div class="blog" >
                                @if (!empty($single->link))<a href="{{$single->link}}" target="_blank">
                                @else <a href="{{route('en.home.news', [$single->id])}}" target="_blank">
                                @endif

                                <div class="date  ">{{$single->date}}</div>
                                <img class="w-100" src="{{asset('') . $single->image->link}}" alt="blog-img">
                                <div class="blog-content  ">
                                    <h3 class="text-capitalize">{{$single->title}}</h3>
                                    <p>{!! strip_tags($single->description) !!}</p>
                                </div>
                            </a>
                            </div>

                        </div>
                    @endforeach

                    @foreach ($news->slice(3) as $item)
                        <div class="col-md-4 hiddable">
                            <div class="blog ">
                                @if (!empty($item->link))<a href="{{$item->link}}" target="_blank">
                                @else <a href="{{route('en.home.news', [$item->id])}}" target="_blank">
                                @endif
                                <div class="date  ">{{$item->date}}</div>
                                <img class="w-100" src="{{asset('') . $item->image->link}}" alt="blog-img">
                                <div class="blog-content  ">
                                    <h3 class="text-capitalize">{{$item->title}}</h3>
                                    <p>{!! strip_tags($item->description) !!}</p>
                                </div></a></div>
                        </div>
                    @endforeach

                </div>
                <div class="row col-12 justify-content-center text-center "data-aos="zoom-in" data-aos-duration="1000">
                        <a class="btn btn-custom " ><p>show more</p>  <i class="fas fa-arrow-down"></i></a>
                </div>
    </div>

    </section>

    <section id="mother">
        <div class="container">
            <h3 data-aos="flip-down" data-aos-duration="1000">Mother Design</h3>
            <p class="text-center"data-aos="flip-right" data-aos-duration="1000">
                {!!strip_tags($website_text->mother_design)!!}
            </p>
        </div>
    </section>

    <div class="container">
            <div class="col-12 text-center quote " data-aos="zoom-in" data-aos-duration="1000">
                    <p><q>{!!strip_tags($website_text->quote4)!!}</q></p>
            </div>
    </div>

    <section id="team">
        <div class="container">
                <h1 class="text-center title" data-aos="zoom-in" data-aos-duration="1000">Our team</h1>
                <div class=" justify-content-center underline" data-aos="zoom-in" data-aos-duration="1000"></div>
            <div class="row flex-center sm-no-flex">
                    <div class="pull-left col-md-12 col-lg-4 sm-text-center">
                            <div class="team-overview">
                                <h2 data-aos="flip-down"data-aos-delay="800" data-aos-duration="1000">Who We Are?</h2>
                                <h6 data-aos="flip-right"data-aos-delay="850" data-aos-duration="1000">Meet the Entire Team</h6>
                                <p ><div data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000">
                                    {!!strip_tags($website_text->who_we_are)!!}
                                    <a href="">info@twnafeg.com</a>.</div></p>
                            </div>
                        </div><!-- /end col-md-4 -->
                <div class="pull-right sm-no-float col-md-12 col-lg-8">
                    <ul class="team-members">
                        <!-- single member row starts -->
                        <li class="clearfix">
                            <div class="member-details" data-aos="zoom-in" data-aos-delay="0" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/sameh.png" alt="MIchael">
                                    <div class="member-info">
                                        <h3>sameh<br>aziz</h3>
                                        <!-- <p>UI Designer</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="member-details" data-aos="zoom-in" data-aos-delay="0" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/MIchael-Armani.png" alt="MIchael">
                                    <div class="member-info">
                                        <h3>Michael<br>Armani</h3>
                                        <!-- <p>UI Designer</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="member-details" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/Ramy-Waguih.png" alt="Ramy">
                                    <div class="member-info">
                                        <h3>Ramy<br>Waguih</h3>

                                    </div>
                                </div>
                            </div>

                            <div class="member-details" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/Fadi-Antaki.png" alt="fadi">
                                    <div class="member-info">
                                        <h3>Fadi<br>Antaki</h3>

                                    </div>
                                </div>
                            </div>
                        </li><!-- /single member row ends -->

                        <!-- single member row starts -->
                        <li class="clearfix">
                                <div class="member-details" data-aos="zoom-in" data-aos-delay="150" data-aos-duration="1000">
                                        <div>
                                            <img src="{{asset('assets')}}/img/team/Mina-Profile.png" alt="Mina">
                                            <div class="member-info">
                                                <h3>Mina<br>Michel</h3>

                                            </div>
                                        </div>
                                    </div>
                            <div class="member-details" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/andrew-farag.png" alt="andrew">
                                    <div class="member-info">
                                        <h3>Andrew<br>Farag</h3>

                                    </div>
                                </div>
                            </div>

                            <div class="member-details" data-aos="zoom-in" data-aos-delay="250" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/Fadi-Guindi2.png" alt="Fadi-Guindi">
                                    <div class="member-info">
                                        <h3>Fadi<br>Guindi</h3>

                                    </div>
                                </div>
                            </div>

                            <div class="member-details" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/Joe-Khayat.png" alt="Joe-Khayat">
                                    <div class="member-info">
                                        <h3>Joe<br>Khayat</h3>

                                    </div>
                                </div>
                            </div>
                        </li><!-- /single member row ends -->

                        <!-- single member row starts -->
                        <li class="clearfix">
                            <div class="member-details" data-aos="zoom-in" data-aos-delay="350" data-aos-duration="1000">
                                <div>
                                        <img src="{{asset('assets')}}/img/team/shady-naguib2.png" alt="shady-naguib">
                                    <div class="member-info">
                                        <h3>shady<br>naguib</h3>

                                    </div>
                                </div>
                            </div>

                            <div class="member-details" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/Michel-Moussa-.png" alt="Michel-Moussa">
                                    <div class="member-info">
                                        <h3>Michel<br>Moussa</h3>

                                    </div>
                                </div>
                            </div>
                            <div class="member-details" data-aos="zoom-in" data-aos-delay="450" data-aos-duration="1000">
                                    <div>
                                        <img src="{{asset('assets')}}/img/team/habashy.png" alt="habashy">
                                        <div class="member-info">
                                            <h3>fady<br>habashy</h3>

                                        </div>
                                    </div>
                                </div>

                            <div class="member-details" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="1000">
                                <div>
                                    <img src="{{asset('assets')}}/img/team/1F4A0047.png" alt="bassem">
                                    <div class="member-info">
                                        <h3>bassem abd<br>elmalek</h3>

                                    </div>
                                </div>
                            </div>
                        </li><!-- /single member row ends -->
                        <!-- single member row starts -->
                        <li class="clearfix">
                                <div class="member-details" data-aos="zoom-in" data-aos-delay="550" data-aos-duration="1000">
                                    <div>
                                            <img src="{{asset('assets')}}/img/team/Mohab-Magdy.png" alt="Mohab-Magdy">
                                        <div class="member-info">
                                            <h3>Mohab<br>Magdy</h3>

                                        </div>
                                    </div>
                                </div>

                                <div class="member-details" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="1000">
                                    <div>
                                        <img src="{{asset('assets')}}/img/team/georgepng.png" alt="georgepng">
                                        <div class="member-info">
                                            <h3>george<br>alber</h3>

                                        </div>
                                    </div>
                                </div>

                                <div class="member-details" data-aos="zoom-in" data-aos-delay="700" data-aos-duration="1000">
                                    <div>
                                        <img src="{{asset('assets')}}/img/team/shrif-sabry.png" alt="shrif">
                                        <div class="member-info">
                                            <h3>sherif<br>sabry</h3>

                                        </div>
                                    </div>
                                </div>
                            </li><!-- /single member row ends -->


                    </ul><!-- /end team-photos -->
                </div><!-- /end col-md-8 -->


            </div><!-- /end row -->
        </div><!-- /end container -->
    </section>

    <section id="contacts">
        <div class="contacts-data overflow-hidden ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 cont-txt" data-aos="fade-left" data-aos-delay="0" data-aos-duration="1000">
                        <h3>Get in <span>Touch</span></h3>
                        <p>{!!strip_tags($website_text->get_in_touch)!!}</p>
                    </div>
                    @if ($setting->whatsapp_number_show)
                        <div class="col-md-2 col-sm-4 col-ms-12  cont " data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
                            <a href="https://wa.me/201208451555" target="_blank">
                                <div class="i-container text-center"><i class="fab fa-whatsapp fa-3x"></i></div>
                                <p class="title text-center">What's App</p>
                                <div class="breaker"></div>
                                <p class="data text-center">{{$setting->whatsapp_number}}</p>
                            </a>
                        </div>
                    @endif

                    @if ($setting->facebook_link_show)
                        <div class="col-md-2 col-sm-4 col-ms-12 cont " data-aos="fade-down" data-aos-delay="0" data-aos-duration="1000">
                            <a href="{{$setting->facebook_link}}" target="_blank">
                                <div class="i-container text-center"><i class="fab fa-facebook-f fa-3x"></i></div>
                                <p class="title text-center">Facebook</p>
                                <div class="breaker"></div>
                                <p class="data text-center">The World Needs A Father - Egypt</p>
                            </a>
                        </div>
                    @endif
                    <div class="col-md-2 col-sm-4 col-ms-12 cont " data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
                            <a href="mailto:{{$setting->email}}" target="_blank">
                            <div class="i-container text-center"><i class="far fa-envelope fa-3x"></i></div>
                            <p class="title text-center">E-mail</p>
                            <div class="breaker"></div>
                            <p class="data text-center">{{$setting->email}}</p>
                            </a>
                    </div>
                </div>

            </div>

        </div>

    </section>

@endsection


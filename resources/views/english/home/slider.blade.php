<section id="home">
    <div class="home-container">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide parallax" style="background: url({{asset('') .  $slide->image->link}}) center top;">
                            <div class="container text">
                                @foreach ($slide->text()->orderBy('order', 'ASC')->get() as $text)
                                    @if($text->type == "h1")     <h1>{{$text->text}}</h1>
                                    @elseif($text->type == "h2") <h2>{{$text->text}}</h2>
                                    @elseif($text->type == "h3") <h3>{{$text->text}}</h3>
                                    @elseif($text->type == "h4") <h4>{{$text->text}}</h4>
                                    @elseif($text->type == "h5") <h5>{{$text->text}}</h5>
                                    @endif
                                @endforeach
                            </div>
                            <a href="" class="r-info" data-izimodal-open="#modal3" data-izimodal-transitionin="fadeInDown" ></a>
                    </div>

                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
    </div>

</section>

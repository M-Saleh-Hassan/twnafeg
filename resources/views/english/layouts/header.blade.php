<header id="nav">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light position-fixed">
        <div class="container">
            <a class="navbar-brand" href="{{route('en.home.index', [app()->getLocale()])}}">
                <img class="logo" src="{{asset('') . logo()->link}}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-pills ml-auto justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#about">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#vision">Vision</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#events">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#testimonials">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#media">Media</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link" href="#mother">Mother</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" link href="#team">Team</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link link" href="#contacts">Contacts</a>
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

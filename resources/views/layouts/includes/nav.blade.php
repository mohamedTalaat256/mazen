<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>


        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav w-100 d-flex justify-content-between">


                <div class="d-flex">
                    <li class="nav-item">
                        <a class="nav-link active"href="{{ route('home') }}">{{ __('nav.home') }}</a>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('nav.projects') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                                href="{{ route('project_type', ['project_type' => 'residential']) }}">{{ __('nav.residential') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="{{ route('project_type', ['project_type' => 'commercial']) }}">{{ __('nav.commercial') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="{{ route('project_type', ['project_type' => 'coastal']) }}">{{ __('nav.coastal') }}</a>
    
                        </div>
                    </li>
                </div>

               



                <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>



                <div class="d-flex">
                    <li class="nav-item">
                        <a class="nav-link "href="{{ route('home') }}#about_us_section">{{ __('nav.about_us') }}</a>
                    </li>
    
    
                    <li class="nav-item">
                        <a class="nav-link " href="contact.html">{{ __('home.compounds') }}</a>
                    </li>
    
                    <li class="nav-item dropdown">
    
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (app()->getLocale() == 'en')
                                <img src="{{ asset('assets/images/home/' . __('nav.en') . '.png') }}">
                                {{ __('nav.en') }}
                            @else
                                <img src="{{ asset('assets/images/home/' . __('nav.ar') . '.png') }}">
                                {{ __('nav.ar') }}
                            @endif
    
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (app()->getLocale() == 'en')
                                <a class="dropdown-item"
                                    href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                    <span class="arabic_word">ع</span>
                                    <img src="{{ asset('assets/images/home/ع.png') }}">
                                </a>
                            @else
                                <a class="dropdown-item "
                                    href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                    <span class="english_word">en</span>
                                    <img src="{{ asset('assets/images/home/en.png') }}">
                                </a>
                            @endif
    
    
    
                        </div>
                    </li>
                </div>

            </ul>
        </div>

        <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse"
            data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
            <i class="bi bi-search"></i>
        </button>

    </div>
</nav><!-- End Header/Navbar -->

{{-- @if (app()->getLocale() == 'en')
    <div class="about-us-en" id="about_us_section" style="margin-top: -90px">
    @else
        <div class="about-us-ar" id="about_us_section">
@endif

<div class="row" >
    @if (app()->getLocale() == 'en')
        <div class="col text-center title ">
            <p> top <span style="color: #FFA515;"> compounds </span></p>
        </div>
        @else
            <div class="col text-center title ">
                <p> الأكثر <span style="color: #FFA515;">طلبا </span></p>
            </div>
    @endif
</div>


<div class=" m-auto">
    <div class="" class="carousel"
    data-flickity='{ "selectedAttraction": 0.01, "friction": 0.15, "adaptiveHeight": true, "freeScroll": false,"pageDots":false, "prevNextButtons": true, "autoPlay": 5000, "pauseAutoPlayOnHover": false,"imagesLoaded":true }'>
     @foreach ($top_compounds as $compound)
        <a href="{{ route('display_compound', $compound->id)}}" class="col-md-4 col-lg-3 col-sm-6   mt-3">
            <div class=" top_compound_card position-relative">
                <div class="d-flex " style="height: 200px">
                    <p class=" text-uppercase text-center top_compound_card_title ">
                        {{ $compound->name }}
                    </p>
                    <div class="top_compound_card_overlay" style="width: 100%;"></div>
                    <img src="{{ asset('assets/images/' . $compound->type . '/' . $compound->cover_image) }}"
                        style="width: 100%;object-fit: cover">
                </div>
            </div>
        </a>
    @endforeach
</div>
</div>

 --}}

<!-- ======= Latest Properties Section ======= -->
<section class="section-property section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        <h2 class="title-a">{{__('home.top_compounds')}}</h2>
                    </div>
                    <div class="title-link">
                        <a href="property-grid.html">{{__('home.see_more')}}
                            <span class="bi bi-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        @foreach ($top_compounds as $compound)
            
        @endforeach

        <div class="card-box-a card-shadow col-md-4" style="height: 500px">
            <img src="{{ asset('assets/images/' . $compound->type . '/' . $compound->cover_image) }}" alt="{{ $compound->name }} image" class="img-a img-fluid">
            <div class="card-overlay">
                <div class="card-overlay-a-content">
                    <div class="card-header-a">
                        <h2 class="card-title-a">
                            <a  href="{{ route('display_compound', $compound->id)}}">{{ $compound->name }}</a>
                        </h2>
                    </div>
                    <div class="card-body-a">
                        <div class="price-box d-flex">
                            <span class="price-a">{{__('home.start_price')}} | $ {{ $compound->start_price }}</span>
                        </div>
                        <a href="{{ route('display_compound', $compound->id)}}" class="link-a">{{__('home.click_to_view')}}
                            <span class="bi bi-chevron-right"></span>
                        </a>
                    </div>
                    <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around bg-my-primary">
                            <li>
                                <h4 class="card-info-title">Area</h4>
                                <span>340m
                                    <sup>2</sup>
                                </span>
                            </li>
                            <li>
                                <h4 class="card-info-title">Beds</h4>
                                <span>2</span>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section><!-- End Latest Properties Section -->

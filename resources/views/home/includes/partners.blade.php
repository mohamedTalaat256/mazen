@if (app()->getLocale() == 'en')
    <div class="text-center our-partners-title">
        <div class="col title">
            <p> our <span style="color: #FFA515;">partners</span></p>
        @else
            <div class="text-center ar-parteners-title">
                <div class="col title">
                    <p><span style="color: #FFA515;">شركاء </span>العمل</p>
@endif
</div>
</div>
<div class="logos_slider" class="carousel"
    data-flickity='{ "selectedAttraction": 0.01, "friction": 0.15, "adaptiveHeight": true, "freeScroll": false,"pageDots":false, "prevNextButtons": false, "autoPlay": 2000, "pauseAutoPlayOnHover": false,"imagesLoaded":true }'>
    <img class="w3-image" src="{{ asset('assets/images/home/logo_1.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_2.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_3.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_4.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_5.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_6.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_7.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_8.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_9.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_10.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_11.svg') }}">
    <img class="w3-image" src="{{ asset('assets/images/home/logo_12.svg') }}">
</div>
</div>

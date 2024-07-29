@extends('layouts.app')

@section('home_style')
<style>
    .english-word{
        
    }
    #overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 2;
    }

    .slider-container {
        height: 100%;
        width: auto;
        overflow: hidden;
    }



    #myCarousel .buttons {
        position: absolute;
        top: 16vw;
        left: 6vw;
        transform: translate(25%, 25%);
        -ms-transform: translate(-25%, -25%);
        font-size: 2vw;
        font-weight: bold;
        z-index: 3;
        width: 400px;
    }

    .slider-item {
        position: absolute;
        color: #fff;
        top: 40%;
        left: 35%;
        font-size: 3vw;
        font-family: Studio Grotesk DEMO ExtraBold;
        letter-spacing: .9vw;
        z-index: 2;
    }

    .slider-item .inner {
        font-size: 1.6vw;
        
        letter-spacing: .3vw;
    }


    .carousel_btn {
        color: #f5bb1b;
        text-decoration: none;
        font-family: Studio Grotesk DEMO thin;
        letter-spacing: .5vw;
        font-size: 21px;
        margin: 20px;
    }

    .carousel_btn i {
        font-size: 10px;
        display: inline-block;
        -webkit-transform: scale(2, 1);
        /* Safari and Chrome */
        -moz-transform: scale(2, 1);
        /* Firefox */
        -ms-transform: scale(2, 1);
        /* IE 9 */
        -o-transform: scale(2, 1);
        /* Opera */
        transform: scale(2, 1);
        /* W3C */
    }

    .carousel_btn:hover {
        color: #cfa739;
        text-decoration: none;
    }


    .our-partners {
        font-size: 27px;
        overflow: hidden;
    }

    .logos_slider {
        padding-top: 20px;
        height: 250px;
    }

    .logos_slider img {

        padding: 20px;
        display: block;
        margin-left: 40px;
        margin-right: 40px;
        height: 180px;
        max-width: 350px;
    }

    .our-feature {
        overflow: hidden;
    }


    .our-feature img {
        width: 100%;

    }

    .our-feature img:hover {
        text-decoration: none;
    }

    .about-us-en {
        color: #fff;
        font-size: 30px;
        line-height: 80px;
        overflow: hidden;
        font-family: Studio Grotesk DEMO Regular;
        letter-spacing: 3px;
    }
    .about-us-ar {
        color: #fff;
        font-size: 30px;
        line-height: 80px;
        overflow: hidden;
        font-family: Noor Regular;
    }


    .mountain_view_icity {
        margin-top: 50px;
        letter-spacing: 8px;
        font-family: Studio Grotesk DEMO Regular;
    }

    .carousel.is-fullscreen .carousel-cell {
        height: 100%;
    }


    @media screen and (max-width: 600px) {

        .slider-item {
            top: 44%;
            left: 30%;
            font-size: 19px;
            letter-spacing: 3px;
        }

        .slider-item .inner {
            font-size: 11px;
            max-width: 70%;

        }

        .carousel_btn {
            letter-spacing: .5vw;
            font-size: 14px;
        }

        .buttons i {
            font-size: 7px;
            display: inline-block;
            -webkit-transform: scale(2, 1);
            /* Safari and Chrome */
            -moz-transform: scale(2, 1);
            /* Firefox */
            -ms-transform: scale(2, 1);
            /* IE 9 */
            -o-transform: scale(2, 1);
            /* Opera */
            transform: scale(2, 1);
            /* W3C */
        }

        .buttons {
            margin-top: 135%;
        }

        .logos_slider {
            padding-top: 20px;
            height: 200px;
        }

        .about-us-en {
            color: #fff;
            font-size: 22px;
            line-height: 40px;
            overflow: hidden;
            letter-spacing: 3px;
            padding-left: 5%;
            padding-right: 5%;
        }
        .about-us-ar {
            color: #fff;
            font-size: 22px;
            line-height: 40px;
            overflow: hidden;
            padding-left: 5%;
            padding-right: 5%;
        }


    }
</style>
@endsection

@section('home_header_content')

                    <div class="carousel-item active">
                        <div id="overlay"></div>

                        <img src="../../images/home/home_slider_1.png" width="100%" style="position: relative;">
                        <div class="slider-item" id="home_slide_one">
                            Because We Appreciate
                            <br>
                            The Value of Homes
                            <br>
                            <p class="inner">We Are Here to Help You Find Your Valuable Home</p>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div id="overlay"></div>
                        <img src="../../images/home/home_slider_2.png" alt="Chicago" width="100%" height="100%"
                            style="position: relative;">
                        <p class="slider-item">
                            Creating real value
                            <br>
                            in property and places
                        </p>
                    </div>
                    <div class="carousel-item">
                        <div id="overlay"></div>
                        <img src="../../images/home/home_slider_3.png" alt="New York" width="100%" height="100%"
                            style="position: relative;">
                        <p class="slider-item">
                            We know how to invest
                            <br>
                            let’s do it together
                        </p>
                    </div>
</header>
@endsection
                <!---->



@section('home_cotent_body')
<div>
    <div class="text-center our-partners">
        <div class="col title">
            <p><span style="color: #FFA515;">{{__('nav.our_partners')}}</span></p>
        </div>
    </div>
    <div class="logos_slider" class="carousel"
        data-flickity='{ "selectedAttraction": 0.01, "friction": 0.15, "fullscreen": true, "adaptiveHeight": true, "freeScroll": false,"pageDots":false, "prevNextButtons": false, "autoPlay": 2000, "pauseAutoPlayOnHover": false,"imagesLoaded":true }'>
        <img class="w3-image" src="../../images/home/logo_1.svg">
        <img class="w3-image" src="../../images/home/logo_2.svg">
        <img class="w3-image" src="../../images/home/logo_3.svg">
        <img class="w3-image" src="../../images/home/logo_4.svg">
        <img class="w3-image" src="../../images/home/logo_5.svg">
        <img class="w3-image" src="../../images/home/logo_6.svg">
        <img class="w3-image" src="../../images/home/logo_7.svg">
        <img class="w3-image" src="../../images/home/logo_8.svg">
        <img class="w3-image" src="../../images/home/logo_9.svg">
        <img class="w3-image" src="../../images/home/logo_10.svg">
        <img class="w3-image" src="../../images/home/logo_11.svg">
        <img class="w3-image" src="../../images/home/logo_12.svg">
    </div>
</div>
<div class="our-feature">
    <div class="row text-center title featured-projects-title">
        <div class="col">
            <p><span style="color: #FFA515;">{{__('nav.our_features_projects')}}</span></p>
        </div>
    </div>
    <div class="row">
        <a href="{{ route('project_type', ['id'=>'1']) }}" class="col-md-4 p-0 m-0">
            <img class="w3-image" src="../../images/home/residential.png">
            <p class="text-uppercase text-center centered_project">{{__('nav.residintial')}}</p>
        </a>
        <a href="{{ route('project_type', ['id'=>'2']) }}" class="col-md-4 p-0 m-0">
            <img class="w3-image" src="../../images/home/commerical.png">
            <p class="text-uppercase text-center centered_project">{{__('nav.commercial')}}</p>
        </a>
        <a href="{{ route('project_type', ['id'=>'3']) }}" class="col-md-4 p-0 m-0">
            <img class="w3-image" src="../../images/home/costal.png">
            <p class="text-uppercase text-center centered_project">{{__('nav.coastal')}}</p>
        </a>
    </div>
</div>
<!--------------------------------about us--------------------------->
    @if (app()->getLocale() == 'en')
        <div class="about-us-en" id="about_us_section">
    @else
        <div class="about-us-ar" id="about_us_section">
    @endif

    <div class="row m-3">
        <div class="col text-center title about-us-title">
            <p><span style="color: #FFA515;"> {{__('nav.about_us')}}</span></p>
        </div>
    </div>





    <div class="row" style="padding-left: 8%; padding-right: 8%;">
        <div class="col text-center">
            {{__('nav.about_us_body_one')}}
            <br>
            {{__('nav.about_us_body_two')}}
            <br>
            {{__('nav.about_us_body_three')}}
        </div>
    </div>

</div>

<script src="../../js/flickity.pkgd.min.js"></script>


@endsection



@section('slider_buttons')
<div class="buttons">
    <a class="carousel_btn" href="#myCarousel" data-slide="prev"> <i
            class="fa fa-arrow-left"></i> PREV</a>
    <a class="carousel_btn" href="#myCarousel" data-slide="next"> NEXT <i
            class="fa fa-arrow-right"></i></a>
</div>


@endsection

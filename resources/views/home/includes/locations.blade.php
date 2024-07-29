
    <style>
        .english-word {
            
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
            /*   font-family: Studio Grotesk DEMO thin; */
            /*  letter-spacing: .5vw; */
            font-size: 21px;
            margin: 20px;
        }

        .ar_carousel_btn_font {
            letter-spacing: 0vw;
        }

        .en_carousel_btn_font {
            letter-spacing: .5vw;
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

<div class="container">
    <div class="our-feature" id="our_projects_type">
        <div class="row text-center title">
            <div class="col">
                <p> {{__('home.locations')}} <span style="color: #FFA515;"></span></p>
            </div>
        </div>
        <div class="row">


            @foreach ($locations as $location)

            <a href="{{ route('project_location', ['project_location' => $location->id, 'project_type' => $project->type]) }}" class="col-md-4 col-lg-4  mt-3">
                <div class=" top_compound_card position-relative">
                    <div class="d-flex " style="height: 300px">
                        <p class="text-uppercase text-center centered_project " >
                            {{ $location->name }}
                        </p>
                        <div class="top_compound_card_overlay" style="width: 100%;"></div>
                        <img src="{{ asset('assets/images/locations/' . $location->cover_image) }}"
                            style="width: 100%;object-fit: cover">
                    </div>
                </div>
            </a>
            
            @endforeach
        </div>

    </div>

</div>

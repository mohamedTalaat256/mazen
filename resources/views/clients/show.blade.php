@extends('layouts.app')

@section('title')
        {{$compound->name}}
@endsection

@section('header_content')
    <div class="carousel-item active">
    <div id="overlay"></div>
    <img src="../../../images/projects/{{$compound->home_background}}" width="100%" style="position: relative;">
    @if (app()->getLocale() == 'en')

        <p class="text-uppercase text-center centered" style="width: 100%;">
            {{$compound->name}}
        <br>
        <span id="inner" class="text-lowercase">
            <a href="index.html">the value investment > projects </a>>  <a href="residential.html"> {{__('nav.'.$compound->type)}} > </a>{{$compound->name}}
        </span>
        </p>
    @else
        <p class="text-uppercase text-center centered" style="width: 100%;">
            {{$compound->ar_name}}
        <br>
        <span id="inner" class="text-lowercase">
            <span class="english_word"><a href="index.html">the value investment </a></span>
            <span> > </span>
            <span> {{$compound->ar_name}}</span>
            <span> < </span>
            <span><a href="residential.html">{{__('nav.'.$compound->type)}}</a></span>
            <span> < </span>
            <span><a href="residential.html">المشاريع</a></span>

        </span>
        </p>
    @endif

    </div>
@endsection







@section('content')
    <div>
        @if (app()->getLocale() == 'en')
        <div class="row text-center">
            <div class="col mountain_view_icity title">
                <p> {{$compound->name}} <span style="color: #FFA515;"> {{__('compound.overview')}}</span></p>
            </div>
        </div>
        @else
        <div class="row text-center">
            <div class="col mountain_view_icity title">
                <p class="text-center"><span style="color: #FFA515;"> {{__('compound.overview')}}</span> {{$compound->ar_name}} </p>
            </div>
        </div>
        @endif

        <div class="row" style="padding-left: 5%; padding-right: 5%;">
            <div class="col-md-6  mt-5">
                <img src="../../../images/projects/{{$compound->overview_background}}" width="100%">
            </div>




            @if (app()->getLocale() == 'en')
                <div class="col-md-6 mt-5 mountain_view_icity_body">
                    {{$compound->overview}}
            </div>
            @else
            <div class="col-md-6 mt-5 mountain_view_icity_body" style="float: right;
            text-align: right;">
                {{$compound->ar_overview}}
           </div>
            @endif




        </div>
    </div>




    <div class="row information container m-auto">
        <p class="col-md-4 p-2 text-center">
            <span>{{__('compound.status')}}</span>
            <br>
            {{__('compound.'.$compound->status)}}
            <br>

        </p>
        <p class="col-md-4 p-2 text-center">
            <span>{{__('compound.area')}}</span>
            <br>
            {{$compound->area}}
            <br>
        </p>
        <p class="col-md-4 p-2 text-center">
            <span>{{__('compound.location')}}</span>
            <br>
            @if (app()->getLocale() == 'en')
                {{$compound->location}}
                @else{{$compound->ar_location}}
                @endif
            <br>

        </p>
        <p class="col-md-4 p-2 text-center">
            <span>{{__('compound.type')}}</span>
            <br>
            {{__('nav.'.$compound->type)}}
            <br>

        </p>
        <p class="col-md-4 p-2 text-center">
            <span>{{__('compound.installments')}}</span>
            <br>
            {{$compound->installments}}
            @if ($compound->installments <= 10)
                {{__('compound.years')}}
            @else
            {{__('compound.year')}}
            @endif

            <br>

        </p>
        <p class="col-md-4 p-2 text-center">
            <span>{{__('compound.payment_plans')}}</span>
            <br>
            {{$compound->payment_plans}}
            <br>

        </p>
        <p class="col-md-4 p-2 text-center">
            <span>{{__('compound.start_price')}}</span>
            <br>
            {{$compound->start_price}}
            {{__('compound.million')}}
            <br>

        </p>
    </div>

    <div>
        <div class="gallery">
            <div class="text-center title gallary-title">

                <p><span style="color: #FFA515;">{{__('compound.gallery')}}</span></p>
            </div>
        </div>
        <div class="gallery_slider" class="carousel"
            data-flickity='{ "fullscreen": true, "adaptiveHeight": true, "freeScroll": false,"pageDots":true, "prevNextButtons": true, "autoPlay": true, "imagesLoaded":true }'>

            @foreach ($compound_gallery as $gallery)

            <img class="w3-image" src="../../../images/projects/{{$gallery->image}}">
            @endforeach



        </div>

        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
        </div>
    </div>


<script src="../../js/flickity.pkgd.min.js"></script>
<script src="../../js/site.js"></script>
@endsection

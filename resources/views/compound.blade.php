@extends('layouts.app')

@section('title')
    {{ $compound->name }}
@endsection


@php

    $site_info = App\Models\Setting::first();
    
    $lang_en = app()->getLocale() == 'en';
    $style = '<style> .wrap-effect-1 {  .item {';
    $img_index = 1;

    if($compound_gallery != null){
        foreach (explode('|', $compound_gallery->images) as $image) {
        $style .= ' &:nth-of-type(' . $img_index . ') {  background-image: url("' . asset('assets/images/gallery/' . $compound->en_name . '/' . $image) . '"); } ';
        $img_index++;
    }
    }
   
    $style .= ' } } </style>';
@endphp

@section('style')
        {!! $style !!}
@endsection





@section('content')

    <div class="my_project container text-wihte" style="padding-top: 50px; {{app()->getLocale() == 'ar' ? "direction: rtl; text-align: start" : ""}}" >


    <span class="text-lowercase project_path">
        @if (app()->getLocale() == 'en')
            <a href="{{ route('home') }}">the value investment > projects </a>> <a
                href="{{ route('project_type', ['project_type' => $compound->type]) }}">
                {{ __('nav.' . $compound->type) }} >
            </a>{{ $compound->name }}
        @else
            <span>
                <span class="english_word"><a href="{{ route('home') }}">the value investment </a></span>


                <span>
                    > </span>
                <span>
                    <a
                        href="{{ route('project_type', ['project_type' => $compound->type]) }}">{{ __('nav.' . $compound->type) }}</a>
                </span>
                <span> > </span>
                <span> {{ $compound->name }}</span>
        @endif
    </span>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container-general">
                    <div class="gallery-wrap wrap-effect-1">

                        
                        @if ($compound_gallery != null)
                            @foreach ($compound_gallery as $item)
                            <div class="item"></div>
                            @endforeach
                        @else
                            
                        @endif
                       

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    {{-- cmopound information --}}
    <div class="project_action">
        <p class="compound_title mt-5 mb-3 text-my-primary" >{{ $compound->name }}</p>
        <p class="text-dark">{{ $compound->location_name }}</p>

        <div class="row">
            <div class="col-3">
                <p class="price_start_from">{{ __('subproject.start_price') }}</p>
                <p class="compound_numbers"> {{ $compound->start_price }} </p>
            </div>
            <div class="col-3">
                <p class="price_start_from">{{ __('home.max_price') }}</p>
                <p class="compound_numbers"> {{ $compound->max_price }} </p>
            </div>

            <div class="col-6">
                <div class="row d-flex justify-content-between">
                    @include('layouts.includes.btn_call')
                    @include('layouts.includes.btn_whatsapp')
                </div>
            </div>
        </div>
    </div>
    {{-- end cmopound information --}}

    <div class="divider my-4"></div>

    {{-- details section --}}
    <div >
        <p class="compound_title text-capitalize">{{ __('home.details') }}</p>

        <button class="details-btn btn btn-outlined btn-lg m-2 p-3 ">
            <i class="fa fa-image text-warning fa-lg"></i>
            <br>
            {{ __('home.gallery') }}
        </button>

        <button class="details-btn btn btn-outlined btn-lg m-2 p-3" type="button" data-toggle="modal" data-target="#masterPlanModal">
            <i class="fa fa-industry text-primary fa-lg"></i>
            <br>
            {{ __('home.master_plan') }}

        </button>

        <button class="details-btn btn btn-outlined btn-lg m-2 p-3 " type="button" data-toggle="modal" data-target="#googleMapModal">
            <i class="fa fa-map-marker text-danger fa-lg"></i>
            <br>
            {{ __('home.location') }}
        </button>
    </div>
    {{-- end details section --}}

    {{-- amenities section --}}
    <div>
        <p class="compound_title mt-5">{{ __('home.aminities') }}</p>
        <div class="row p-3">
            @foreach ($amenities as $amenity)
                <button class="aminities-btn btn btn-outlined btn-lg m-2 ">
                    <img src="{{ asset('assets/images/amenities/' . $amenity->amenity_image) }}">
                    {{ $amenity->amenity_name }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- end amenities section --}}

    {{-- payment plan --}}
    <div>
        <p class="compound_title text-capitalize mt-5">{{ __('home.master_plan') }}</p>
        <button class="details-btn btn btn-outlined btn-lg m-2 p-3 compound_numbers ">
            {{ $compound->payment_plans }}
            <br>
            <p class="compound_address">
                @if ($compound->installments <= 10)
                {{ $compound->installments . ' ' . __('home.years') }}
            @else
                {{ $compound->installments . ' ' . __('home.year') }}
            @endif

            </p>

        </button>
    </div>
    {{-- end payment plan --}}



    <p class="compound_title mt-5 text-capitalize">{{__('home.explore_more_in')}}<span class="text-my-primary" > {{ $compound->name }}</span></p>


    <div class="row mt-5">
        @foreach ($properties as $property )


        <div class="col-md-6 p-3">
                <div class="card property_card">
                    <div class="d-flex justify-content-center" style="height: 200px">
                        <div class="row mt-3 position-absolute w-100">
                            <div class="col position-relative">
                                <button class="btn resale-btn m-1"> Resale</button>
                            </div>
                            <div class="col d-flex justify-content-end">
    
                                <button class="card-icon m-1">
                                    <i class="fa fa-map-o fa-sm "></i>
                                </button>
                                <button class="card-icon m-1">
                                    <i class="fa fa-external-link "></i>
                                </button>
                                <button class="card-icon m-1">
                                    <i class="fa fa-heart-o "></i>
                                </button>
                            </div>
                        </div>
                        <div class="bg-image hover-zoom">
                            <img src="{{asset('assets/images/'.$property->type.'/properties/'.$property->home_background )}}" style="height: 100%; object-fit: cover"
                            class="card-img-top">
                        </div>
                       
    
                    </div>
    
                    <div class="card-body">
                        <div class="card-title">
                            <a href="{{ route('property.show', $property->id)}}" class="link-hover-orange" >{{$property->name}}</a>
                            
                            <div class="address mt-2">{{$property->location}}</div>
                        </div>
    
    
    
                        <div class=" d-flex justify-content-between ">
                            <div class="">
                                <p class="price_start_from">{{$property->start_price .' / '. $property->payment_years /* . __('home.month') */}} {{__('home.years')}}</p>
                                <p class="project_sub_title">{{$property->max_price .' '.__('home.egy_pound')}}</p>
                            </div>

                            <div class="row d-flex justify-content-end">
                                <a target="_blank" class="" href="https://wa.me/{{$site_info->phone}}">
                                    <button class="btn-bg-call btn-round mx-1">
                                        <i class="fa fa-phone "></i>
                                    </button>
                                </a>
                                <a href="tel:{{$site_info->phone}}">
                                    <button class="btn-bg-whatsapp btn-round mx-1 ">
                                        <i class="fa fa-whatsapp "></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
        @endforeach


    </div>




 {{-- google map modal --}}

 <div class="modal fade text-dark" id="googleMapModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9990;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{__('home.location_on_map')}}</h3>
                <button type="button" class="btn-close btn btn-danger" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                {!!$compound->location_on_map!!}
            </div>
            
        </div>
    </div>
</div>


{{-- master plan modal --}}

<div class="modal fade text-dark" id="masterPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9990;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{__('home.master_plan')}}</h3>
                <button type="button" class="btn-close btn btn-danger" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <img src="{{ asset('assets/images/' . $compound->type . '/' . $compound->master_plan_image) }}" class="w-100">
            </div>
            
        </div>
    </div>
</div>
   


@endsection

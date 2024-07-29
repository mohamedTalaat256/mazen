@extends('layouts.app')

@section('title')
        {{$project->name}}
@endsection

@section('header_content')
    <div class="carousel-item active">
    <div id="overlay"></div>
    <img src="../../../images/projects/{{$project->image}}" width="100%" style="position: relative;">


    @if (app()->getLocale() == 'en')
        <p class="text-uppercase text-center centered" style="width: 100%;">
            {{__('nav.'.$project->name)}}
        <br>
        <span id="inner" class="text-lowercase">
            <a href="index.html">the value investment > projects </a> >  {{__('nav.'.$project->name)}}
        </span>
        </p>
    @else
        <p class="text-uppercase text-center centered" style="width: 100%;">
            {{__('nav.'.$project->name)}}
        <br>
        <span id="inner" class="text-lowercase">
            <span class="english_word"><a href="index.html">the value investment </a></span>
            <span> > </span>
            <span> {{__('nav.'.$project->name)}}</span>
            <span> < </span>
            <span><a href="residential.html">المشاريع</a></span>

        </span>
        </p>
    @endif

    </div>


    <!---------------------------------------------------

    ----------->
@endsection









@section('content')
<div>
    <div class="text-center residential_projects" >

        <div class="row">
            @foreach ($compounds as $compound)
            <a href="{{ route('compounds.show',$compound->id)}}" class="col-md-4 p-0 mt-5">
                <img class="w3-image" src="../../../images/projects/{{$compound->cover_image}}">
                <p class="text-uppercase text-center  centered_project">
                    @if (app()->getLocale() == 'en')
                    {{$compound->name}}
                    @else
                    {{$compound->ar_name}}
                    @endif
                </p>
            </a>
            @endforeach


        </div>
    </div>
</div>

<script src="../../js/flickity.pkgd.min.js"></script>
<script src="../../js/site.js"></script>
@endsection

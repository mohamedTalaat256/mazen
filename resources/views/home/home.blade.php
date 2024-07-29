@extends('layouts.app')

@section('title')
    TVI | Real Estate
@endsection

@section('style')
    <link href="{{ asset('assets/css/home_style.css') }}" rel="stylesheet">

    <style>

.navbar-default {
    transition: all 0.5s ease-in-out;
    padding-top: 28px;
    padding-bottom: 28px;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    background-color: transparent;
    color: var(--white);
    box-shadow: 1px 2px 15px rgba(100, 100, 100, 0.3);
  }

        nav.scrolled {
            background: var(--primary);
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(50, 68, 80, 0.5);
            pointer-events: none;
        }

        .search-input-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            text-align: center;
            width: 500px;
        }

        .search-input {
            border-radius: 30px;
            border: none;
            box-shadow: 0px 6px 6px #8d8d8d9a;
            padding: 10px;
            outline: none;
            border: none;
        }

        .search-dropdown {
            display: none;
            max-height: 250px;
            overflow-y: auto;
            position: absolute;
            background-color: white;
            color: #000000;
            width: 100%;
            list-style-type: none;
            padding: 0;
            margin: 0;
            margin-top: -40px;
            border-radius: 30PX;
            z-index: -1;

        }

        .search-dropdown li {
            padding: 10px;
            cursor: pointer;
            text-align: start;
            font-size: 18px;
        }

        .search-dropdown li:hover {
            background-color: #f0f0f0;
        }
    </style>
@endsection

@section('content')
    <!-- Modal -->
    {{--   @include('home.includes.filter') --}}

    <header>
        <div class="video-container" style="position: relative">
            <video autoplay muted loop id="myVideo">
                <source src="{{ asset('/assets/videos/intro.mp4') }}" type="video/mp4">
            </video>

            <div class="video-overlay"></div>


            <div class="search-input-container">

                <input id="search" class="search-input w-100">
                <ul id="search-dropdown" class="search-dropdown" style="padding-top: 40px">

                    {{-- <li style="margin-top: 40px">Apple</li> --}}
                    @foreach ($all_compounds as $compound)
                        <li>
                            <span class="key" style="display: none">compound_id</span>
                            <span class="value">{{ $compound->name }}</span>
                        </li>
                    @endforeach

                    @foreach ($locations as $location)
                        <li>
                            <span class="key" style="display: none">location_id</span>
                            <span class="value">{{ $location->name }}</span>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>

    </header>

    @include('home.includes.top_combound')

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var input = $(this).val().toLowerCase();
                if (input) {
                    $('#search-dropdown').show();
                    $('#search-dropdown li').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1)
                    });
                } else {
                    $('#search-dropdown').hide();
                }
            });

            // Hide the dropdown when clicking outside
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#search, #search-dropdown').length) {


                    $('#search-dropdown').hide();
                }
            });

            // Handle item selection
            $('#search-dropdown').on('click', 'li', function() {

                let key = this.getElementsByClassName("key")[0].innerHTML
                let value = this.getElementsByClassName("value")[0].innerHTML

                $('#search').val(value);

                console.log(key);
                console.log(value);

                //openSearchScreen
                forwardToSearchPage(key, value);

                $('#search-dropdown').hide();
            });



            function forwardToSearchPage(key, value) {
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('home_search') }}',
                    data: {
                        key: key,
                        value: value
                    },
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });

            }


        });
    </script>
@endsection

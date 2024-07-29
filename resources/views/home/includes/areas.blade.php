@if (app()->getLocale() == 'en')
    <div class="about-us-en" id="about_us_section">
    @else
        <div class="about-us-ar" id="about_us_section">
@endif

<div class="row m-3">
    @if (app()->getLocale() == 'en')
        <div class="col text-center title ">
            <p> top <span style="color: #FFA515;">areas</span></p>
        @else
            <div class="col text-center title ">
                <p> الأكثر <span style="color: #FFA515;">طلبا </span></p>
    @endif
</div>
</div>


<div class="container m-auto">
    <div class="row">
        @foreach ($top_areas as $area)
            <a href="{{ route('project_type', ['project_type' => $area->name]) }}" class="col-md-4 col-lg-3 p-3">
                <div class="row d-flex justify-content-center">
                    <img src="{{ asset('assets/images/locations/' . $area->cover_image) }}"
                    style="height: 200px; width:200px; object-fit: cover; border-radius: 50%;">
                </div>

                <div class="row d-flex justify-content-center">
                    <p class="text-uppercase text-center" style="font-size: 27px;">
                        {{ $area->name }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>

</div>

</div>

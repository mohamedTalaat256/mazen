@if (app()->getLocale() == 'en')
        <div class="about-us-en" id="about_us_section">
        @else
        <div class="about-us-ar" id="about_us_section">
    @endif

    <div class="row m-3">
        @if (app()->getLocale() == 'en')
            <div class="col text-center title about-us-title">
                <p> about <span style="color: #FFA515;">us</span></p>
            @else
                <div class="col text-center title ar-about-title">
                    <p><span style="color: #FFA515;"> {{ __('nav.about_us') }}</span></p>
                    @endif
                </div>
    </div>


    <div class="row" style="padding-left: 8%; padding-right: 8%;">
        <div class="col text-center">

            @if (app()->getLocale() == 'en')
                {{ __('nav.about_us_body_one') }}
            @else
                <span> لأننا ننظر للقيمة في الجوهر</span>
                <span class="english-word">" the value investment "</span>
                <span> تم اختيار اسم</span>
            @endif
            <br>
            {{ __('nav.about_us_body_two') }}
            <br>
            {{ __('nav.about_us_body_three') }}
        </div>
    </div>

    </div>
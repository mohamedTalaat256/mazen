
<div class="container">
    <div class="title-a text-capitalize" id="get_in_touch_section">
        @if (app()->getLocale() == 'en')
            <p> get <span class="text-my-primary ">in touch </span></p>
        @else
            <p><span class="text-my-primary ">تواصل </span>معنا</p>
        @endif
    </div>


    <div class="row" style="padding-left: 6%; padding-right: 6%;">
        <div class="col-md-5 contact">
            <ul>
                <li><i class="fa fa-phone"></i><span class="english_contact">{{$site_info->phone}}</span></li>
                <li><i class="fa fa-envelope"></i><span class="english_contact">{{$site_info->email}}</span>
                </li>
                @if (app()->getLocale() == 'en')
                    <li><i class="fa fa-map"></i>{{$site_info->en_address}}</li>
                @else
                    <li> <i class="fa fa-map" style="letter-spacing:0px"></i><span>{{$site_info->ar_address}}</span></li>
                @endif
            </ul>
    
        </div>
        <div class="col-md-7">
            <div id="get_in_touch_form">
                <div class="row">
                    <div class="col-md">
                        <input type="text" id="name" name="name" placeholder="{{ __('contact_form.name') }}"
                            class="form-control form-input">
                    </div>
                    <div class="col-md">
                        <input type="text" id="phone" name="phone" placeholder="{{ __('contact_form.phone') }}"
                            class="form-control form-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <input type="email" id="email" name="email" placeholder="{{ __('contact_form.email') }}"
                            class="form-control form-input">
                    </div>
                    <div class="col-md">
                        <input type="text" id="message" name="message" placeholder="{{ __('contact_form.message') }}"
                            class="form-control form-input">
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md">
                        <button id="send_btn" class="btn bg-my-primary">{{ __('contact_form.send') }}<i class=" mx-2 fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
<script>
    $('#send_btn').on("click", function() {

        var name = $('#name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var project = $('#project_title').html();
        var message = $('#message').val();

        $('#centralModalSm').modal('show');
        $('#response_modal_body').html('loading...');

        $.ajax({
            method: 'POST', // Type of response and matches what we said in the route
            url: '{{ route('add_client') }}',
            dataType: "json",
            data: {
                name: name,
                phone: phone,
                email: email,
                project: project,
                message: message,
                _token: '{{ csrf_token() }}',
            },
            success: function(data) {
                $('#response_modal_body').html(data.message);
                $('#name').val('');
                $('#phone').val('');
                $('#email').val('');
                $('#message').val('');
            }
        });
    });

    function check() {
        return confirm("تأكيد الحذف");
    }
</script>

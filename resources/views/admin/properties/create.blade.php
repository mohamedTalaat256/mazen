@extends('layouts.admin')
@section('title')
    Admin :: Add New Property
@endsection
@section('content')
<div style="width: 80%; margin: auto; background-color: #ffffff; border-radius: 20px; margin-top: 100px">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2> Add New Property </h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('admin.properties.index') }}"> back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    @if ($message = Session::get('success-msg'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<form action="{{ route('admin.properties.save') }}" method="POST" enctype="multipart/form-data" class="card p-3 shadow" style="font-size: 16px">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>background image</label>
                <input type="file"  name="background_image" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>cover image</label>
                <input type="file" name="cover_image" class="form-control" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>master plan image</label>
                <input type="file" name="master_plan_image" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>ar name</label>
                <input type="text"  name="ar_name" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>en name</label>
                <input type="text" name="en_name" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>ar overview</label>
                <input type="text"  name="ar_overview" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>en overview</label>
                <input type="text" name="en_overview" class="form-control" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>overview background</label>
                <input type="file" name="overview_background" class="form-control" required>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>status</label>
                <select name="status" class="form-select form-control" aria-label="Default select example">
                    <option value="under construction">under construction</option>
                    <option value="constructed">constructed</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>area from</label>
                <input type="text" name="area_from" class="form-control" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>area to</label>
                <input type="text" name="area_to" class="form-control" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>location</label>

                <select name="location_id" class="form-select form-control" aria-label="Default select example">

                    @foreach ($locations as $location)
                        <option value="{{$location->id}}">{{$location->en_name}}</option>

                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Compound</label>

                <select name="compound_id" class="form-select form-control" aria-label="Default select example">

                    @foreach ($compounds as $compound)
                        <option value="{{$compound->id}}">{{$compound->en_name}}</option>

                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>en location</label>
                <input type="text" name="en_location" class="form-control" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>ar location</label>
                <input type="text" name="ar_location" class="form-control" required>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>type</label>
                <select name="type" class="form-select form-control" aria-label="Default select example">
                    <option value="residential">residential</option>
                    <option value="commercial">commercial</option>
                    <option value="coastal">coastal</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>installments years</label>
                <input type="text" name="installments" class="form-control" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>payment plans</label>
                <input type="text" name="payment_plans" class="form-control" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>payment years</label>
                <input type="text" name="payment_years" class="form-control" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>start price</label>
                <input type="text" name="start_price" class="form-control" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>max price</label>
                <input type="text" name="max_price" class="form-control" required>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>bedrooms</label>
                <input type="text" name="bedrooms" class="form-control" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>bathrooms</label>
                <input type="text" name="bathrooms" class="form-control" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>deliverd_in</label>
                <input type="text" name="deliverd_in" class="form-control" required>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>location on map</label>
                <textarea type="text" name="location_on_map" rows="3" class="form-control" required></textarea>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</form>
</div>

<script>

function img_pathUrl(input){
    $('#img_url').show();
        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
</script>
@endsection

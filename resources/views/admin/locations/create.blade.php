@extends('layouts.admin')
@section('title')
    Admin :: Add New Location
@endsection
@section('content')
<div style="width: 80%; margin: auto; background-color: #ffffff; border-radius: 20px; margin-top: 100px">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2> Add New Location </h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('locations.index') }}"> back</a>
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

<form action="{{ route('locations.store') }}" enctype="multipart/form-data" method="POST"class="card p-3 shadow" style="font-size: 16px">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>en name</label>
                <input type="text"  name="en_name" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>ar name</label>
                <input type="text" name="ar_name" class="form-control" required>
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
                <label>home image</label>
                <input type="file" name="home_image" class="form-control" required>
            </div>
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">save</button>
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

@extends('layouts.admin')
@section('title')
    Admin :: Edit SubProject
@endsection
@section('content')
<div class="p-3 " style="background-color: #ffffff;  margin-top: 100px">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit SubProject </h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('admin.compounds.index') }}"> back</a>
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

<form action="{{ route('admin.compounds.update',$compound->id) }}" method="POST" enctype="multipart/form-data" class="card p-3 shadow">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>home background</label>
                <input type="file" name="home_background" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>cover image</label>
                <input type="file" name="cover_image" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label> master plan image</label>
                <input type="file" name="master_plan_image" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>ar name</label>
                <input type="text"  name="ar_name" class="form-control" value="{{$compound->ar_name}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>en name</label>
                <input type="text" name="en_name" class="form-control" value="{{$compound->en_name}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>ar overview</label>
                <textarea name="ar_overview" cols="30" rows="10" class="form-control">
                    {{$compound->ar_overview}}
                </textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>en overview</label>
                <textarea name="en_overview" cols="30" rows="10" class="form-control">
                    {{$compound->en_overview}}
                </textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>overview background</label>
                <input type="file" name="overview_background" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
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
                <input type="text" name="area_from" class="form-control" value="{{$compound->area_from}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>area to</label>
                <input type="text" name="area_to" class="form-control"value="{{$compound->area_to}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>location</label>
                <select name="location_id" class="form-select form-control" aria-label="Default select example" required>
                    <option value="{{$compound->location_id}}">{{$compound->en_location}}</option>

                    @foreach ($locations as $location)
                        <option value="{{$location->id}}">{{$location->en_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>en location</label>
                <input type="text" name="en_location" class="form-control"value="{{$compound->en_location}}">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>ar location</label>
                <input type="text" name="ar_location" class="form-control"value="{{$compound->ar_location}}">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>type</label>
                <select name="type" class="form-select form-control" aria-label="Default select example">

                    <option value="residential"> {{$compound->type}}</option>
                    <option value="residential">residential</option>
                    <option value="commercial">commercial</option>
                    <option value="coastal">coastal</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>installments years</label>
                <input type="text" name="installments" class="form-control" value="{{$compound->installments}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>payment years</label>
                <input type="text" name="payment_years" class="form-control" value="{{$compound->payment_years}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>payment plans</label>
                <input type="text" name="payment_plans" class="form-control" value="{{$compound->payment_plans}}">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>start price</label>
                <input type="text" name="start_price" class="form-control" value="{{$compound->start_price}}">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>max price</label>
                <input type="text" name="max_price" class="form-control" value="{{$compound->max_price}}">
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>location on map</label>
                <textarea type="text" name="location_on_map" rows="3" class="form-control" required>{{$compound->location_on_map}}</textarea>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">save</button>
    </div>
</form>
</div>

<script>
</script>
@endsection

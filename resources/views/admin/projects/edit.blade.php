@extends('layouts.admin')
@section('title')
    Admin :: Edit Project
@endsection

@section('content')
<div style="width: 80%; margin: auto; background-color: #ffffff; border-radius: 20px; margin-top: 100px">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Project</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('main_projects') }}"> back</a>
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

<form action="{{ route('update_project') }}" method="POST" enctype="multipart/form-data" class="card p-3 shadow" style="font-size: 16px">
    @csrf
    <input type="hidden" name="id" class="form-control"  value="{{$project->id}}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>background image</label>
                <input type="file" name="background_image" class="form-control">

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <img src="{{asset('assets/images/'.$project->type.'/'.$project->background_image )}}" width="260">
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>cover image</label>
                <input type="file" name="cover_image" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <img src="{{asset('assets/images/home/'.$project->cover_image )}}" width="160">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>ar name</label>
                <input type="text"  name="ar_name" class="form-control" value="{{$project->ar_name}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>en name</label>
                <input type="text" name="en_name" class="form-control" value="{{$project->en_name}}">
            </div>
        </div>
    </div>



    <div class="row">

        <div class="col-md-2">
            <div class="form-group">
                <label>type</label>
                <select name="type" class="form-select form-control" aria-label="Default select example">
                    <option value="{{$project->type}}">{{$project->type}}</option>
                    <option value="residential">residential</option>
                    <option value="commercial">commercial</option>
                    <option value="coastal">coastal</option>
                </select>
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

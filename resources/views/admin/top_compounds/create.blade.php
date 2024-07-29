@extends('layouts.admin')
@section('title')
    Admin :: Add New Compound
@endsection
@section('content')
<div style="width: 80%; margin: auto; background-color: #ffffff; border-radius: 20px; margin-top: 100px">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2> Add New Compound </h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('admin.top_compounds.index') }}"> back</a>
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

<form action="{{ route('admin.top_compounds.save') }}" method="POST" enctype="multipart/form-data" class="card p-3 shadow" style="font-size: 16px">
    @csrf

    

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>compound</label>
                <select name="compound_id" class="form-control">
                    @foreach ($compounds as $compound )
                    <option value="{{$compound->id}}">{{$compound->en_name}}</option>                        
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>compound order</label>
                <input type="text" name="compound_order" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">save</button>
    </div>
</form>
</div>

@endsection

@extends('layouts.admin')
@section('title')
All Properties
@endsection
@section('content')
<div class="" style="background-color: #ffffff; padding: 1%; padding-top: 70px; margin-top: 100px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>All Properties</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.properties.create') }}">create new Property</a>
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

    <div class="table-responsive">
       
        <div class="d-flex justify-content-center">
            {!! $properties->links() !!}
        </div>
    <table class="table table-bordered table-striped table-hover" id="prd_table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">background</th>
            <th scope="col">status</th>
            <th scope="col">areas</th>
            <th scope="col">location</th>
            <th scope="col">type</th>
            <th width="col"></th>
        </tr>
    </thead>
    <tbody id="products_table_body">

        @foreach ($properties as $property)
        <tr>
            <td>{{ $property->id }}</td>
            <td>{{ $property->en_name }} <br>{{ $property->ar_name }}</td>
            <td> <img src="{{asset('assets/images/'.$property->type. '/properties/' .$property->cover_image )}}" width="106.7" height="60"> </td>
            <td>{{ $property->status }}</td>
            <td>{{ $property->area_from }}
                <br>
                {{ $property->area_to }}
            </td>
            <td>{{ $property->en_location }} <br> {{ $property->ar_location }} </td>
            <td>{{ $property->type }}</td>
            <td><a target="_blank" class="btn btn-warning" href="{{ route('property.show',$property->id)}}"><i class="fa fa-eye"></i></a>
                <a class="btn btn-primary" href="{{ route('admin.properties.edit', $property->id) }}"><i class="fa fa-edit"></i></a>
                <a class="btn btn-success" href="{{ route('admin.property_galleries.index', $property->id) }}"><i class="fa fa-image"></i></a>
                <a class="btn btn-info" href="{{ route('admin.property_amenities.index', $property->id) }}">amenities</a>
                <a class="btn btn-danger" href="{{ route('admin.properties.delete',$property->id) }}"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $properties->links() !!}
    </div>
    </div>

</div>
@endsection

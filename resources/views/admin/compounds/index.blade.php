@extends('layouts.admin')
@section('title')
    كل المشاريع
@endsection
@section('content')
<div class="" style="background-color: #ffffff; padding: 1%; padding-top: 70px; margin-top: 100px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>All Compounds</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.compounds.create') }}">create new Compound</a>
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
        <div class="form-group">
            <strong>Search</strong>
            <select name="project_name" id="" class="form-control" onchange="window.location.href=this.value;">
                @foreach ($compounds as $compound)
                <option value="{{ route('admin.compounds.edit', ['id' => $compound->id]) }}">{{$compound->en_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-center">
            {!! $compounds->links() !!}
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

        @foreach ($compounds as $compound)
        <tr>
            <td>{{ $compound->id }}</td>
            <td>{{ $compound->en_name }} <br>{{ $compound->ar_name }}</td>
            <td> <img src="{{asset('assets/images/'.$compound->type.'/'.$compound->home_background )}}" width="106.7" height="60"> </td>
            <td>{{ $compound->status }}</td>
            <td>{{ $compound->area_from }}
                <br>
                {{ $compound->area_to }}
            </td>
            <td>{{ $compound->en_location }} <br> {{ $compound->ar_location }} </td>
            <td>{{ $compound->type }}</td>
            <td><a target="_blank" class="btn btn-warning" href="{{ route('display_compound',$compound->id)}}"><i class="fa fa-eye"></i></a>
                <a class="btn btn-primary" href="{{ route('admin.compounds.edit', $compound->id) }}"><i class="fa fa-edit"></i></a>
                <a class="btn btn-success" href="{{ route('admin.compound_gallery.index', $compound->id) }}"><i class="fa fa-image"></i></a>
                <a class="btn btn-info"    href="{{ route('admin.compound_amenities.index', $compound->id) }}">amenities</a>
                <a class="btn btn-danger"  href="{{ route('admin.compounds.delete',$compound->id) }}"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $compounds->links() !!}
    </div>
    </div>

</div>
@endsection

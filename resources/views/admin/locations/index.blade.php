@extends('layouts.admin')
@section('title')
locations
@endsection
@section('content')
<div style="background-color: #ffffff; padding: 1%; padding-top: 70px; margin-top: 100px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>locations</h2>
            </div>

            <div class="float-right">
                <a class="btn btn-success" href="{{ route('locations.create') }}">new</a>
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
            {!! $locations->links() !!}
        </div>
    <table class="table table-bordered table-striped table-hover" id="prd_table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="products_table_body">

        @foreach ($locations as $location)
        <tr>
            <td>{{ $location->id }}</td>
            <td>{{ $location->en_name }} <br> {{ $location->ar_name }}</td>
            <td> <img src="{{asset('assets/images/locations/'.$location->cover_image )}}" width="60.7" height="106"> </td>
            <td>
                <form action="{{ route('locations.destroy',$location->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('locations.edit',$location->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">X</button>
                </form>
            </td>
          
        </tr>
        @endforeach

    </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $locations->links() !!}
    </div>
    </div>

</div>
<script type="text/javascript">



</script>
@endsection

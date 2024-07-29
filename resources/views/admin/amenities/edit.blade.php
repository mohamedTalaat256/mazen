@extends('layouts.admin')

@section('content')
    <div class="container"
        style="background-color: #ffffff; padding: 40px 20px 40px 20px; border-radius: 20px; margin-top: 200px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>edit amenity</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('admin.amenities.index') }}"> back</a>
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

        <form action="{{ route('admin.amenities.update') }}" method="POST" enctype="multipart/form-data"
            class="invoice_form card p-3 m-2 shadow">
            @csrf
            <div class="row">
                <input type="hidden" name="amenity_id" id="amenity_id" value="{{$amenity->id}}">
                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <label>en_name</label>
                        <input type="text" name="en_name" class="form-control" value="{{$amenity->en_name}}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <label>ar_name</label>
                        <input type="text" name="ar_name" class="form-control" value="{{$amenity->ar_name}}" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <label>image</label>
                        <input type="file" name="image" multiple class="form-control" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">save</button>
                </div>
            </div>
        </form>
    </div>

    <script></script>
@endsection

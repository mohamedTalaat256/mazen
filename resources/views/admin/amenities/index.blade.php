@extends('layouts.admin')

@section('content')
    <div class="container"
        style="background-color: #ffffff; padding: 40px 20px 40px 20px; border-radius: 20px; margin-top: 200px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>add new amenity</h2>
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

        <form action="{{ route('admin.amenities.save') }}" method="POST" enctype="multipart/form-data"
            class="invoice_form card p-3 m-2 shadow">
            @csrf
            <div class="row">

                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <label>en_name</label>
                        <input type="text" name="en_name" class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <label>ar_name</label>
                        <input type="text" name="ar_name" class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <label>image</label>
                        <input type="file" name="image" multiple class="form-control" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">save</button>
                </div>
            </div>
        </form>

        <!------------------------------------------------------------------------------------------------->
        <div class="table-responsive">

            <table class="table" id="prd_table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 30px">#</th>
                        <th style="width: 180px">name</th>
                        <th style="width: 180px">image</th>
                        <th style="width: 180px">action</th>
                    </tr>
                </thead>
                <tbody id="products_table_body">

                        @foreach ( $amenities as $amenity)
                            <tr>
                                <td>#{{$amenity->id}}</td>
                                <td>{{ $amenity->en_name }} <br> {{$amenity->ar_name}}</td>
                                <td> <img src="{{ asset('assets/images/amenities/'.$amenity->image) }}"> </td>
                                <td>
                                    <a href="{{ route('admin.amenities.edit', ['id'=>$amenity->id]) }}" class="btn btn-primary"> edit</a>
                                </td>
                            </tr>
                        @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <script></script>
@endsection

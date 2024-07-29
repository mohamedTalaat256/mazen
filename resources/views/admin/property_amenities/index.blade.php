@extends('layouts.admin')

@section('content')
    <div class="container"
        style="background-color: #ffffff; padding: 40px 20px 40px 20px; border-radius: 20px; margin-top: 200px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>compound amenities</h2>
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

        <form action="{{ route('admin.property_amenities.save') }}" method="POST" enctype="multipart/form-data"
            class="invoice_form card p-3 m-2 shadow">
            @csrf
            <h1>{{$property->en_name}}</h1>
            <div class="row">



                <input type="hidden" name="property_id" value="{{$property->id}}" readonly>
                <div class="col-xs-12 col-sm-3">
                    <label>aminity</label>
                        <select name="amenity_id" class="form-control">
                            @foreach ($amenities as $amenity )
                                <option value="{{$amenity->id}}">{{$amenity->en_name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">add</button>
                </div>
            </div>
        </form>

        <!------------------------------------------------------------------------------------------------->
        <div class="table-responsive">

            <table class="table" id="prd_table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 180px">amenity</th>
                        <th style="width: 180px">compound</th>
                        <th style="width: 180px">action</th>
                    </tr>
                </thead>
                <tbody id="products_table_body">

                        @foreach ( $property_amenities as $item)
                            <tr>
                                <td>{{ $item->amenity_name }} </td>
                                <td> {{ $item->property_name }} </td>
                                <td><a class="btn btn-danger"
                                    href="{{ route('admin.property_amenities.delete', ['amenity_id' => $item->amenity_id, 'property_id' => $item->property_id]) }}"><i
                                        class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <script></script>
@endsection

@extends('layouts.admin')
@section('title')
    Admin:: Home Sliders
@endsection
@section('content')
<div class="container" style=" background-color: #ffffff; padding: 1%; padding-top: 70px; margin-top: 100px">

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


    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>All Home Silder Images  </h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('create_home_slider') }}">new</a>
        </div>
    </div>

    <div class="table-responsive">


    <table class="table table-bordered table-striped table-hover" id="prd_table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">caption big</th>
            <th scope="col">caption small</th>
            <th width="col"></th>
        </tr>
    </thead>
    <tbody id="products_table_body">

        @foreach ($slider_images as $slider_image)
        <tr>
            <td>{{ $slider_image->id }}</td>
            <td> <img src="{{ asset('assets/images/home/' . $slider_image->image) }}" width='160' ></td>
            <td>{{ $slider_image->caption_big }}</td>
            <td>{{ $slider_image->caption_small }}</td>
            <td><a class="btn btn-primary" href="{{ route('edit_slider_images', $slider_image->id) }}"> edit </a>
                <a class="btn btn-danger" href="{{ route('delete_slider_image',$slider_image->id) }}">X</a></td>
        </tr>
        @endforeach

    </tbody>
    </table>

    </div>

</div>
<script type="text/javascript">



</script>
@endsection

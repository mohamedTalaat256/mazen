@extends('layouts.admin')
@section('title')
    Admin:: Edit Site Settings
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

    <form action="{{ route('update_site_settings') }}" method="POST" enctype="multipart/form-data" class="invoice_form card p-3 m-2 shadow">
        @csrf
        <div class="row">


            <div class="col-md-4">
                <div class="form-group">
                    <label>site logo</label>
                    <input type="file" name="site_logo" class="form-control" >
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$site_info->phone}}">

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>ar_about</label>
                    <input type="text" name="ar_about" class="form-control" value="{{$site_info->ar_about}}">

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>en_about</label>
                    <input type="text" name="en_about" class="form-control" value="{{$site_info->en_about}}">

                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email" class="form-control" value="{{$site_info->email}}">

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>ar address</label>
                    <input type="text" name="ar_address" class="form-control" value="{{$site_info->ar_address}}">

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>en address</label>
                    <input type="text" name="en_address" class="form-control" value="{{$site_info->en_address}}">

                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">save</button>
            </div>
        </div>
    </form>

</div>
<script type="text/javascript">



</script>
@endsection

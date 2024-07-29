@extends('layouts.admin')
@section('title')
    Admin:: New Home Sliders
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

    <form action="{{ route('store_slider_image') }}" method="POST" enctype="multipart/form-data" class="invoice_form card p-3 m-2 shadow">
        @csrf
        <div class="row">


            <div class="col-md-6">
                <div class="form-group">
                    <label>image</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>caption big</label>
                    <textarea name="caption_big"  cols="30" rows="10" class="form-control">


                    </textarea>

                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label>caption small</label>
                    <textarea name="caption_small"  cols="30" rows="10" class="form-control">


                    </textarea>

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

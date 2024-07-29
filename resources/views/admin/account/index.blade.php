@extends('layouts.admin')
@section('title')
    Admin:: Edit Account
@endsection
@section('content')
<div class="container" style=" background-color: #ffffff; padding: 10%; padding-top: 70px; margin-top: 100px">

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





    <form action="{{ route('update_account') }}" method="POST" enctype="multipart/form-data" class="card p-5 m-2 shadow">
        <h1>Edit Account</h1>
        <br>
        @csrf
        <div class="row">


            <div class="col-md-12">
                <div class="form-group">
                    <label>name</label>
                    <input type="text" name="name" class="form-control" value="{{$account->name}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email" class="form-control" value="{{$account->email}}">

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="password" class="form-control" >

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>confirm password</label>
                    <input type="text" name="confirm_password" class="form-control" >

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

@extends('layouts.admin')
@section('title')
clients
@endsection
@section('content')
<div style="background-color: #ffffff; padding: 1%; padding-top: 70px; margin-top: 100px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>clients</h2>
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
            <strong>search</strong>
            <input type="text" class="form-control col-md-3" id="search_product" name="search_product">
        </div>
        <div class="d-flex justify-content-center">
            {!! $clients->links() !!}
        </div>
    <table class="table table-bordered table-striped table-hover" id="prd_table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">phone</th>
            <th scope="col">email</th>
            <th scope="col">message</th>
            <th scope="col">project</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="products_table_body">

        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }} </td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->message }}</td>
            <td>{{ $client->project }}</td>
            <td><a class="btn btn-danger" href="{{ route('delete_client',$client->id) }}">X</a></td>
        </tr>
        @endforeach

    </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $clients->links() !!}
    </div>
    </div>

</div>
<script type="text/javascript">



</script>
@endsection

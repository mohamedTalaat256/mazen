@extends('layouts.admin')
@section('title')
    Admin :: Top Compounds
@endsection
@section('content')
<div class="container" style="background-color: #ffffff; padding: 1%; padding-top: 70px; margin-top: 100px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Top Compounds</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.top_compounds.create') }}">Add new</a>
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
        
       
    <table class="table table-bordered table-striped table-hover" id="prd_table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">top_compound_id</th>
            <th scope="col">compound name</th>
            <th scope="col">order</th>
            <th width="col"></th>
        </tr>
    </thead>
    <tbody id="products_table_body">

        @foreach ($top_compounds as $top_compound)
        <tr>
            <td>{{ $top_compound->top_compound_id }}</td>
            <td>{{ $top_compound->compound_name }}</td>
            <td>{{ $top_compound->compound_order }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('admin.top_compounds.edit', $top_compound->top_compound_id) }}"><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger"  href="{{ route('admin.top_compounds.delete',$top_compound->top_compound_id) }}"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
    </table>
    
    </div>

</div>
@endsection

@extends('layouts.admin')
@section('title')
    Admin :: All Projects
@endsection
@section('content')
<div class="container" style=" background-color: #ffffff; padding: 1%; padding-top: 70px; margin-top: 100px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>All Main Projects  </h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('create_compound') }}">new</a>
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
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">background</th>
            <th scope="col">cover</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="products_table_body">

        @foreach ($main_projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->ar_name }} <br>{{ $project->en_name }}</td>
            <td> <img src="{{asset('assets/images/'.$project->type.'/'.$project->background_image )}}" width="106.7" height="60"> </td>
            <td> <img src="{{asset('assets/images/home/'.$project->cover_image )}}" width="60"> </td>
            <td>
                <a class="btn btn-warning" href="{{ route('project_type', ['project_type' => $project->type]) }}">  view</a>
                <a class="btn btn-primary" href="{{ route('edit_project', $project->id) }}">  edit </a>
                <a class="btn btn-danger" href="{{ route('delet_sub_project',$project->id) }}">X</a>
            </td>
        </tr>
        @endforeach

    </tbody>
    </table>

    </div>

</div>
<script type="text/javascript">



</script>
@endsection

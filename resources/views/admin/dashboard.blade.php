@extends('layouts.admin')
@section('title')
    Admin::dashboard
@endsection
@section('dashboard')
    <div class="container dashbord-container">
        <div class="row d-flex justify-content-center">
            <a href="{{ route('clients.index') }}" class="col-md-3 btn btn-primary btn-lg m-2 p-5">
                clients
                <i class="fa fa-users"></i>
            </a>

            <a href="main_projects" class="col-md-3 btn btn-warning btn-lg m-2 p-5">
                main projects
                <i class="fa fa-building"></i>
            </a>

            <a href="{{ route('admin.compounds.index') }}" class="col-md-3 btn btn-primary btn-lg m-2 p-5">
                all compounds
                <i class="fa fa-building"></i>
            </a>

            <a href="account" class="col-md-3 btn btn-danger btn-lg m-2 p-5">
                account settings
                <i class="fa fa-user"></i>
            </a>


            <a href="{{ route('admin.amenities.index') }}" class="col-md-3 btn btn-warning btn-lg m-2 p-5">
                Amenities
                <i class="fa fa-building"></i>
            </a>

            <a href="{{ route('admin.properties.index') }}" class="col-md-3 btn btn-success btn-lg m-2 p-5">
                Properties
                <i class="fa fa-user"></i>
            </a>


            <a href="all_slider_images" class="col-md-3 btn btn-dark btn-lg m-2 p-5">
                Edit Slider images
                <i class="fa fa-image"></i>
                <i class="fa fa-image"></i>
                <i class="fa fa-image"></i>
            </a>

            <a href="site_setting" class="col-md-3 btn btn-info btn-lg m-2 p-5">
                site settings
                <i class="fa fa-gear"></i>
            </a>

            <a href="{{ route('locations.index') }}" class="col-md-3 btn btn-info btn-lg m-2 p-5">
                locations
                <i class="fa fa-map"></i>
            </a>

            <a href="{{ route('admin.top_compounds.index') }}" class="col-md-3 btn btn-success btn-lg m-2 p-5">
               top compounds
               <i class="fa fa-home"></i>
           </a>

            <a href="backup_now" class="col-md-3 btn btn-secondary btn-lg m-2 p-5">
                backup now
                <i class="fa fa-rotate-right"></i>
            </a>
        </div>

    </div>
@endsection


</body>

</html>

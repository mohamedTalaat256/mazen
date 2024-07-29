@extends('layouts.admin')
@section('content')
    <div class="container"
        style="background-color: #ffffff; padding: 40px 20px 40px 20px; border-radius: 20px; margin-top: 200px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>add gallery to compound</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('admin.compounds.index') }}"> back</a>
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

        <form action="{{ route('admin.compound_gallery.save') }}" method="POST" enctype="multipart/form-data"
            class="invoice_form card p-3 m-2 shadow">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-3 hidden">
                    <div class="form-group">
                        <label>id</label>
                        <input type="text" name="compound_id" class="form-control" readonly value="{{ $compound->id }}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-3">
                    <div class="form-group">
                        <label>الصور</label>
                        <input type="file" name="images[]" multiple class="form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>

        <!------------------------------------------------------------------------------------------------->
        <div class="table-responsive">

            <table class="table" id="prd_table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 30px">#</th>
                        <th style="width: 180px">الصورة</th>
                    </tr>
                </thead>
                <tbody id="products_table_body">
                    @if ($project_gallery != null)
                        @foreach (explode('|', $project_gallery->images) as $image)
                            <tr>
                                <td>{{ $image }}</td>
                                <td> <img width="260" height="260"
                                        src="{{ asset('assets/images/gallery/' . $compound->en_name . '/' . $image) }}">
                                </td>
                            </tr>
                        @endforeach
                    @else
                    @endif

                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                @if ($project_gallery != null)
                    <a class="btn btn-danger"
                        href="{{ route('admin.compound_gallery.delete', ['id' => $project_gallery, 'compound_name' => $compound->en_name]) }}">
                        clear gallery</a>
                @endif

            </div>
        </div>
    </div>

    <script></script>
@endsection

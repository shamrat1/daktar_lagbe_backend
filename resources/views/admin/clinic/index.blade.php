@extends('admin_layout.layouts.fixed')
@section('title','All Clinics')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Clinics</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Clinics</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 card rounded shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Name (BN)</th>
                                <th>Image</th>
                                <th>Reception Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clinics as $clinic)
                                <tr>
                                    <td>{{($clinics->total()-$loop->index)-(($clinics->currentpage()-1) * $clinics->perpage() )}}</td>
                                    <td>{{ $clinic->name }}</td>
                                    <td>{{ $clinic->name_bn }}</td>
                                    <td><img src="{{ asset($clinic->image) }}" alt="{{ $clinic->image }}" width="100px" height="100px"></td>
                                    <td>{{ $clinic->reception_phone }}</td>
                                    <td>{{ $clinic->complete_address }}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$clinics->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin_layout.layouts.fixed')
@section('title','All Doctors')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Doctors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Doctors</li>
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
                                <th>BMDC NO</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>{{($doctors->total()-$loop->index)-(($doctors->currentpage()-1) * $doctors->perpage() )}}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->name_bn }}</td>
                                    <td><img src="{{ asset($doctor->image) }}" alt="{{ $doctor->image }}" width="100px" height="100px"></td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->complete_address }}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$doctors->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

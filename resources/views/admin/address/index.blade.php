@extends('admin_layout.layouts.fixed')
@section('title','All Departments')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Address</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Address</li>
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
                <div class="col-sm-6 col-md-6 col-lg-5 m-3">
                    <div class="card bg-white">
                        <div class="card-body">
                            @livewire('admin.address.division-create')
                            <hr>
                            @livewire('admin.address.divisions')
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5 m-3">
                    <div class="card bg-white">
                        <h1>H1 div</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
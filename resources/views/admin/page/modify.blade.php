@extends('admin_layout.layouts.fixed')
@section('title','Create / Edit Pages')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Credit/Edit Pages</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.setting.page.index') }}">Pages</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">Title</label>
                                    <input type="text" placeholder="Page Title" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="name">Slug</label>
                                    <input type="text" disabled placeholder="Page Slug" class="form-control">
                                </div>
                                
                            </div>
                            <div class="form-label">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin_layout.layouts.fixed')
@section('title','All Pages')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Pages</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pages</li>
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
                    <div class="card-header">
                        <div class="card-title">
                            Pages ({{ $pages->total() }})
                        </div>
                        <div class="card-tools">
                            <a href="{{ route('admin.setting.page.modify') }}" class="btn btn-primary btn-sm ">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{($pages->total()-$loop->index)-(($pages->currentpage()-1) * $pages->perpage() )}}</td>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->status }}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$pages->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

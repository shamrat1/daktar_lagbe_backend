@extends('admin.layouts.fixed')

@section('title','Permissions')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="row">
                    <h1 class="m-0 text-dark">Permissions</h1> &nbsp;
                </div>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Permissions</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-6">
                <div class="card card-primary rounded shadow">
                    <div class="card-header">
                        <div class="card-title" style="margin-bottom: 0px !important;">
                            All Permissions
                        </div>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permissions as $item)
                                    <tr>
                                        <td>{{($permissions->total()-$loop->index)-(($permissions->currentpage()-1) * $permissions->perpage() )}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <p style="font-size: 9px;">{{ Str::limit($item->description,100) }}</p>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <button id="editBtn" data-description="{{$item->description}}" data-id="{{ $item->id }}" data-name="{{ $item->name }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                                <form action="{{ route('admin.permission.delete',$item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-uppercase">NO Permissions Yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$permissions->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-primary rounded shadow">
                    <div class="card-header">
                        <div class="card-title">
                            <span id="formTitle">New</span> Permission
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('admin.permission.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
                                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-sm" id="reset" type="reset"><i class="fa fa-times"></i></button>
                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@push('js')
    <script>
        $(document).on('click','#editBtn',function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let value = $(this).data('description');
            $('#model_id').remove();
            $('#form').append(`
                <input id="model_id" type="hidden" value="`+id+`" name="id">
            `);
            $('#name').val(name);
            $('#description').val(value);
            $('#formTitle').html('Edit');
        });

        $(document).on('click','#reset',function(){
            $('#model_id').remove();
            $('#formTitle').html('New');
        });
    </script>
@endpush
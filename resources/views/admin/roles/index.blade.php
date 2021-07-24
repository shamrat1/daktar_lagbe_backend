@extends('admin.layouts.fixed')

@section('title','Roles')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="row">
                    <h1 class="m-0 text-dark">Roles</h1> &nbsp;
                </div>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Roles</li>
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
                            All Roles
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
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $role)
                                    <tr>
                                        <td>{{($roles->total()-$loop->index)-(($roles->currentpage()-1) * $roles->perpage() )}}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <p style="font-size: 9px;">{{ Str::limit($role->description,100) }}</p>
                                        </td>
                                        <td>
                                            @forelse($role->permissions as $item)
                                                <span  class="badge badge-success">{{ $item->name }}</span>
                                            @empty
                                                <span class="badge badge-info">NO PERMISSION ASSIGNED</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            <div class="row">
                                                <button id="editBtn" data-permissions="[{{ $role->permissions->implode('id',',') }}]" data-description="{{$role->description}}" data-id="{{ $role->id }}" data-name="{{ $role->name }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                                <form action="{{ route('admin.role.delete',$role->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-uppercase">NO Roles Yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $roles->links("pagination::bootstrap-4") }}

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-primary rounded shadow">
                    <div class="card-header">
                        <div class="card-title">
                            <span id="formTitle">@if(old('id') > 0) Edit @else New @endif</span> Role
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('admin.role.store') }}" method="POST">
                            @csrf
                            @if(old('id') > 0) <input id="model_id" type="hidden" value="{{old('id')}}" name="id"> @endif
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
                            <div class="form-group">
                                <label for="">Permissions</label><br>
                                <select name="permissions[]" id="permissions" multiple class="select2">
                                    @foreach($permissions as $index => $permission)
                                        <option value="{{$permission->id}}" @if(in_array($permission->id,old('permissions') ?? [])) selected="selected" @endif>{{$permission->name}}</option>
                                    @endforeach
                                </select>
                                @error('permissions') <small class="text-danger">{{ $message }}</small> @enderror
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
            let permissions = $(this).data('permissions');
            $('#model_id').remove();
            $('#form').append(`
                <input id="model_id" type="hidden" value="`+id+`" name="id">
            `);
            $('#permissions').val(permissions).trigger('change');
            $('#name').val(name);
            $('#description').val(value);
            $('#formTitle').html('Edit');
        });

        $(document).on('click','#reset',function(){
            $('#model_id').remove();
            $('#formTitle').html('New');
            $('#permissions').val([]).trigger('change');
        });
    </script>
@endpush
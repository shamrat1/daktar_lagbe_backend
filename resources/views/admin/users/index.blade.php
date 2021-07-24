@extends('admin_layout.layouts.fixed')

@section('title','Users')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="row">
                    <h1 class="m-0 text-dark">Users</h1> &nbsp;
                </div>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('root') }}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
            <div class="col-7">
                <div class="card card-primary rounded shadow">
                    <div class="card-header">
                        <div class="card-title" style="margin-bottom: 0px !important;">
                            All Users
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
                                    <th>Mobile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{($users->total()-$loop->index)-(($users->currentpage()-1) * $users->perpage() )}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            {{$user->mobile}}
                                        </td>
                                        <td>
                                            <div class="row justify-content-center">
                                                <a href="{{ route('admin.user.show',$user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('admin.user.delete',$user->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-uppercase">NO Users Yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$users->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card card-primary rounded shadow">
                    <div class="card-header">
                        <div class="card-title">
                            <span id="formTitle">New</span> User
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form" action="{{ route('admin.user.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" value="{{ old('mobile') }}">
                                @error('mobile') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password Confirmation</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
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
            let value = $(this).data('value');
            $('#model_id').remove();
            $('#form').append(`
                <input id="model_id" type="hidden" value="`+id+`" name="id">
            `);
            $('#name').val(name);
            $('#value').val(value);
            $('#formTitle').html('Edit');
        });

        $(document).on('click','#reset',function(){
            $('#model_id').remove();
            $('#formTitle').html('New');
        });
    </script>
@endpush
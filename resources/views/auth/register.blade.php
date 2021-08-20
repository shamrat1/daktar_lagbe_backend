
@extends('auth.auth-layout')
@section('title','Register')
@section('content')
    <div class="container-fluid h-100">
        <div class="d-flex justify-content-center h-100" style="margin-top: 50px;margin-bottom: 100px;">
            <div class="col-4">
                <div class="card rounded shadow mt-5">
                    <div class="card-body">
                        <div class="col-12 text-center">
                            <img src="https://picsum.photos/seed/picsum/100/100" width="100px" height="100px" class="rounded-circle" alt="">
                            <h4>Daktar Lagbe</h4>
                        </div>
                        
                        <hr>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group my-1">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Your Name" class="form-control" value="{{ old('name') }}" >
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="email@example.com" class="form-control" value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{$message}}</small> @else <small class="text-muted">Email Must Be Unique</small> @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="">Mobile No</label>
                                <input type="text" placeholder="Ex. 01234567891" name="mobile" class="form-control" value="{{ old('mobile') }}">
                                @error('mobile') <small class="text-danger">{{$message}}</small> @else <small class="text-muted">Mobile No Must Be Unique</small> @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                                @error('password') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <button class="btn btn-sm btn-success">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-between mt-3" style="font-size: 11px;">
                            <div class="col-6 pull-left">
                                <a href="#" class="text-muted">Forgot Password?</a>
                            </div>
                            <div class="col-6 text-muted">
                                <div class="text-right">
                                    Already Registered? <a href="{{ route('login') }}" class="text-muted">Sign In</a>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

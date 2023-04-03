@extends('layouts.app')

@section('title', 'Login')

@section('content')

    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
    @endif

    @if (session()->has('logout_message'))
        <div class="alert alert-danger">
            {{ session()->get('logout_message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center fw-bold">
                    Login
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                aria-describedby="emailHelp" value="{{ old('email')}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{ old('password')}}">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

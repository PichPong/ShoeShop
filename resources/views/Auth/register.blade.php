@extends('Auth.master');
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Register Form</h3>
                        <form action="{{ route('Auth.register_submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="full name">
                                @error('name')
                                    <span class="text danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="email">
                                @error('email')
                                    <span class="text danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="password">
                                @error('password')
                                    <span class="text danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <a href="{{ route('Auth.login') }}">Login?</a>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
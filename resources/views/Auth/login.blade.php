@extends('Auth.master');
@section('content')

    <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Login Form</h3>
                            <form action="{{ route('Auth.login_submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="email">
                                </div> 
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="password">
                                </div>
                                <a href="{{ route('Auth.register') }}">Register?</a>
                                <button type="submit" class="btn btn-primary w-100 mt-2">Log in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
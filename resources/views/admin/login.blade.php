@extends('admin.admin-master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Admin Login Form</h2>
                @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                   {{ Session::get('error') }}
                  </div>
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                   {{ Session::get('success') }}
                  </div>
                @endif
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email" name="email">
                      @error('email')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                      @error('password')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="rememberMe" name="remember_me">
                      <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
            </div>
        </div>
    </div>

@endsection
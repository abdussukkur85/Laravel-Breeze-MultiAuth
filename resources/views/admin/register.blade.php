@extends('admin.admin-master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Admin Registration</h2>
                <form action="{{ route('admin.register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name"  value="{{ old("name") }}">
                      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email" name="email"  value="{{ old("email") }}">
                      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password"  value="{{ old("password") }}">
                      @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" id="password" value="{{ old("password_confirm") }}">
                      @error('password_confirm') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

@endsection
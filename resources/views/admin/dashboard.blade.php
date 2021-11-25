@extends('admin.admin-master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Welcome to Admin Dashborad</h2>
                <h2>Authenticate Admin Name: {{ Auth::guard('admin')->user()->name }}</h2>
                <h2>Authenticate Admin Email: {{ Auth::guard('admin')->user()->email }}</h2>
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

@endsection
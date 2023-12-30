@extends('layouts.app')
@section('title', 'Login Page')
@section('content')

<div class="row justify-content-center my-5">

    <div class="rounded bg-white shadow-sm border p-4 col-lg-5 col-md-12 my-3">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-circle fs-3 m-2"></i>
            User Login
        </h5>
        @if (session('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('login') }}" class="needs-validation" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <button type="submit" class="btn btn-dark">Login</button>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-decoration-none" for="remember">
                    Remember Me
                </label>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Register Page')
@section('content')

<div class="row justify-content-center my-4">

    <div class="rounded bg-white shadow-sm border p-4 col-lg-8 col-md-12">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-lines-fill fs-3 m-2"></i>
            User Registration
        </h5>

        <div class="row justify-content-center">
            <form action="{{ route('register') }}" class="needs-validation" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input type="file" class="form-control @error('picture') is-invalid @enderror" accept="image/*" id="picture" name="picture">
                    @error('picture')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                </div>
                <div class="d-flex align-items-center justify-content-center my-2">
                    <button type="submit" class="btn btn-dark w-100">Register</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

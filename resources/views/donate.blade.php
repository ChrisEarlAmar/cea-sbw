<!-- resources/views/donate.blade.php -->
@extends('layouts.app')
@section('title', 'Donate Page')
@section('content')
<div class="row justify-content-center my-5">
    <div class="col-md-8 my-5">
        <div class="card">
            <div class="card-header">{{ __('Make a Donation') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('donation.process') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="amount" class="form-label">{{ __('Amount') }}</label>
                        <input id="amount" type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autofocus>
                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ __('Donate') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

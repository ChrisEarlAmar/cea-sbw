@extends('layouts.app')
@section('title', 'Blogs Page')
@section('content')
<div class="row my-5 justify-content-center">
    <div class="bg-white p-5 rounded border shadow-sm col-lg-10">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-substack fs-3 m-2"></i>
            Articles
        </h5>

        @forelse ($blogs as $blog)
        <div class="card my-3 w-100">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/uploads/' . $blog->picture) }}" class="img-fluid rounded img-responsive" alt="{{ $blog->picture }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">{{ $blog->title }}</h3>
                            <p class="card-text">{{ $blog->short }}</p>
                            <p class="card-text"><small class="text-body-secondary">Published {{ $blog->created_at->diffForHumans() }}</small></p>
                        </div>
                        <div class="row mb-sm-3">
                            <div class="d-flex align-items-center justify-content-between px-3">
                                <div class="mx-3">
                                    <img src="{{ asset('storage/uploads/' . $blog->user->picture) }}" alt="User Picture" class="rounded-circle" style="width: 30px; height: 30px;">
                                    <span class="ms-2">{{ $blog->user->name }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-end px-3">
                                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-dark shadow-none mx-2"><i class="bi bi-eye-fill me-2"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info my-3 w-100">There are no blogs available so please create one or more :<span>)</span></div>
        @endforelse

        <div class="d-flex mt-3 justify-content-end pt-4">
            {{ $blogs->links('pagination::bootstrap-4') }}  <!-- Display pagination links -->
        </div>

    </div>
</div>
@endsection
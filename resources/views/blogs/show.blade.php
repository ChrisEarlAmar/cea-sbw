@extends('layouts.app')
@section('title', 'Show Page')
@section('content')
<div class="row my-5 justify-content-center">
    <div class="bg-white p-5 rounded border shadow-sm col-lg-10">
        <header class="blog-header py-3">
            <h1 class="text-center fw-bold mb-3">{{ $blog->title }}</h1>
            <p class="text-center text-muted fst-italic">{{ $blog->short }}</p>
            <div class="d-flex align-items-center my-2">
                <img src="{{ asset('storage/uploads/' . $blog->user->picture) }}" class="rounded-circle me-2" alt="{{ $blog->user->name }}" width="40" height="40">
                <a href="#" class="text-muted mb-0">{{ $blog->user->name }}</a>
            </div>
            <span class="mt-2 text-start text-muted">Published on {{ $blog->created_at->format('F j, Y') }}</span>
        </header>

        <div class="mx-auto my-3">
            <img src="{{ asset('storage/uploads/' . $blog->picture) }}" class="img-fluid w-100" alt="Picture for blog: {{ $blog->title }}">
        </div>

        <div class="my-5">
            @foreach (explode("\n", $blog->content) as $paragraph)
                <p class="text-justify">{!! nl2br(e($paragraph)) !!}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('title', 'Create Page')
@section('content')
<div class="row justify-content-center">
    <div class="accordion accordion-flush border-none col-lg-11 p-5" id="accordionExample">
        <div class="accordion-item shadow-sm p-3">
            <h2 class="accordion-header fs-3 modal-title text-white">
                <button class="accordion-button shadow-none bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="bi bi-pencil-fill fs-3 m-2"></i> Create Blog
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <form action="{{ route('blogs.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                    @csrf
                    <div class="accordion-body">
                        <div class="my-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Your Title Here" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="my-3">
                            <label for="short" class="form-label">Short Flavor<span class="text-muted ms-3">(One Sentence Only)</span></label>
                            <input type="text" class="form-control @error('short') is-invalid @enderror" id="short" name="short" value="{{ old('short') }}" placeholder="Your Short Flavor Text Here" required>
                            @error('short')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="picture" class="form-label">Picture</label>
                            <input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture" required>
                            @error('picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="my-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Your Blog Here" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="d-flex align-items-center justify-content-start mt-3">
                            <button type="submit" class="btn btn-lg btn-dark shadow-none"><i class="bi bi-pencil-square me-2"></i> Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mb-5 justify-content-center">
    <div class="bg-white p-5 rounded border shadow-sm col-lg-10">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-substack fs-3 m-2"></i>
            Your Blogs
        </h5>

        @forelse ($blogs as $blog)
            <div class="card my-3 w-100">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/uploads/' . $blog->picture) }}" class="img-fluid rounded img-responsive" alt="...">
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
                                    <img src="{{ asset('storage/uploads/' . auth()->user()->picture) }}" alt="User Picture" class="rounded-circle" style="width: 30px; height: 30px;">
                                    <span class="ms-2">{{ auth()->user()->name }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-end px-3">
                                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-dark shadow-none mx-2"><i class="bi bi-eye-fill me-2"></i> View</a>
                                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger shadow-none mx-2"><i class="bi bi-trash-fill me-2"></i> Delete</button>
                                    </form>
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
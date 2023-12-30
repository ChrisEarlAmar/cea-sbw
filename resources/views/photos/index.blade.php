@extends('layouts.app')
@section('title', 'Image Search Page')
@section('content')
<div class="my-5">
    <form action="{{ route('photos.search') }}" class="row justify-content-center" method="GET">
        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-auto">
            <input type="text" class="form-control form-control-lg m-2" id="query" name="query" required placeholder="Search for Images...">
            <small class="d-none">Powered by Unsplash Images</small>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-auto">
            <button type="submit" class="btn btn-success btn-lg w-100 m-2"><i class="bi bi-search me-2"></i>Search</button>
        </div>
    </form>
</div>

<div class="row my-5 justify-content-around">

    <div class="rounded shadow col-lg-3 m-3 p-4">
        <h2>Saved Images</h2>
        <hr>
        @foreach ($saved_images as $saved_image)
            <div class="card text-bg-dark mb-3 shadow-sm">
                <img src="{{ $saved_image->url }}" class="card-img" alt="{{ $saved_image->description }}">
                <div class="card-img-overlay justin-content-end">
                    <form action="{{ route('photos.destroy', $saved_image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-danger" type="submit"><i class="bi bi-trash-fill me-2"></i>Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="rounded shadow col-lg-8 m-3 p-4">
        <h2>Search Results</h2>
        <hr>
        @if (!empty($images))
            <div class="">
                @foreach ($images as $image)
                    @if (!\App\Models\Image::where('unsplash_id', $image['id'])->exists())
                    <div class="card bg-dark text-white mb-3 shadow-sm" style="">
                        <img src="{{ $image['urls']['regular'] }}" class="card-img img-fluid" alt="{{ $image['alt_description'] }}">
                        <div class="card-img-overlay justin-content-end">
                            <form action="{{ route('photos.store') }}" method="POST">
                                @csrf 
                                <input type="hidden" name="unsplash_id" value="{{ $image['id'] }}">
                                <input type="hidden" name="url" value="{{ $image['urls']['regular'] }}">
                                <input type="hidden" name="description" value="{{ $image['alt_description'] ?? '' }}">
                                <div class="d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-success" ><i class="bi bi-floppy-fill me-2"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @else
            <p>No images found.</p>
        @endif
    </div>
</div>
@endsection
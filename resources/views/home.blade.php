@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
<div class="px-4 py-5 mt-3 mb-5 text-center">
    <img class="d-block mx-auto mb-3" src="{{ asset('images/hero.png') }}" alt="icon" width="100" height="100">
    <h1 class="display-5 fw-bold text-body-emphasis mb-4">Simple Blogging Website</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Welcome to our blog, where we serve up a delightful assortment of mindless fluff disguised as captivating stories, insightful articles that are anything but, and content so engaging you'll wonder if you accidentally stumbled into a digital black hole. Whether you're desperate for distraction, have a penchant for blandness, or just enjoy wasting time, our blog is your one-stop shop for vacuous reads that will leave you wondering why you bothered in the first place. Join us on this thrilling adventure as we dive headfirst into the shallow end of the internet.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3">
            <a href="{{ route('blogs.create') }}" class="btn btn-dark btn-lg px-4 gap-3">Create a New Blog</a>
            <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary btn-lg px-4">Read More Blogs</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mt-3">
        <div class="row justify-content-around">
            <h2 class="fw-bold mb-3">Latest Articles</h2>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow-sm" style="max-width: 350px; margin: auto;">
                    <img src="{{ asset('images/placeholder.jpg') }}" class="card-img-top" alt="...">        
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('images/profile.png') }}" class="rounded-circle mr-2 me-3" alt="Thumbnail" width="55" height="55">
                            <div>
                                <h6 class="fw-bold mb-0">John Doe</h6>
                                <small class="text-muted">day ago</small>
                            </div>
                        </div>
                        <h4 class="card-title">Article Title</h4>
                        <p class="card-text">Explore the world of machine learning with our beginner-friendly guide.</p>
                        <div class="d-flex justify-content-start mb-2">
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow-sm" style="max-width: 350px; margin: auto;">
                    <img src="{{ asset('images/placeholder.jpg') }}" class="card-img-top" alt="...">        
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('images/profile.png') }}" class="rounded-circle mr-2 me-3" alt="Thumbnail" width="55" height="55">
                            <div>
                                <h6 class="fw-bold mb-0">John Doe</h6>
                                <small class="text-muted">day ago</small>
                            </div>
                        </div>
                        <h4 class="card-title">Article Title</h4>
                        <p class="card-text">Explore the world of machine learning with our beginner-friendly guide.</p>
                        <div class="d-flex justify-content-start mb-2">
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Read More</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow-sm" style="max-width: 350px; margin: auto;">
                    <img src="{{ asset('images/placeholder.jpg') }}" class="card-img-top" alt="...">        
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('images/profile.png') }}" class="rounded-circle mr-2 me-3" alt="Thumbnail" width="55" height="55">
                            <div>
                                <h6 class="fw-bold mb-0">John Doe</h6>
                                <small class="text-muted">day ago</small>
                            </div>
                        </div>
                        <h4 class="card-title">Article Title</h4>
                        <p class="card-text">Explore the world of machine learning with our beginner-friendly guide.    </p>
                        <div class="d-flex justify-content-start mb-2">
                            <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-outline-dark shadow-none">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/blogs" class="btn btn-outline-dark">Read More Articles</a>
        </div>
    </div>
</div>      
@endsection

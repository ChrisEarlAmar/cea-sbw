<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | CEA-SBW</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/image-radio.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/hero.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 me-sm-1 fw-bold fs-5 h-font" href="{{ route('home') }}">
                Nothingburger
            </a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-underline me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link ms-lg-4 me-2 {{ request()->is('home') || request()->is('/') ? 'active' : '' }}" id="home-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 {{ request()->is('blogs*') ? 'active' : '' }}" id="blogs-link" href="{{ route('blogs.index') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 {{ request()->is('create') ? 'active' : '' }}" id="create-blog-link" href="{{ route('blogs.create') }}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 {{ request()->is('photos') ? 'active' : '' }}" id="create-blog-link" href="{{ route('photos.index') }}">Unsplash</a>
                    </li>
                </ul>

                <div class="d-flex">
                    @auth
                    <button class="btn text-dark mx-2 border-none w-100" data-bs-toggle="modal" data-bs-target="#profile_modal">
                        <img src="{{ auth()->user()->picture ? asset('storage/uploads/' . auth()->user()->picture) : asset('storage/default.jpg') }}" alt="Profile Picture" class="rounded-circle me-2" height="40">
                        {{ auth()->user()->name }} <i class="bi bi-caret-down-fill ms-2"></i>
                    </button>
                    @endauth
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-dark shadow-none me-lg-3 me-2 w-100">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark shadow-none w-100">Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div> 
    
    @auth
    <div class="modal fade" id="profile_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-circle fs-5 m-2"></i>User Profile</h1>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-4 p-4">
                            <img src="{{ auth()->user()->picture ? asset('storage/uploads/' . auth()->user()->picture) : asset('storage/default.jpg') }}" alt="Profile Picture" class="rounded-circle" height="130">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-12 text-center">
                            <h2>{{ auth()->user()->name }}</h2>
                            <h6 class="fs-6 text-muted"><span>@</span>{{ auth()->user()->username }}</h6>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-9 mb-3">
                            <button class="btn btn-outline-dark w-100"><i class="bi bi-person-circle m-2"></i> Change Profile Picture</button>                            
                        </div>
                        <div class="col-lg-9 mb-3">
                            <button class="btn btn-outline-success w-100"><i class="bi bi-substack m-2"></i> View Blogs</button>                            
                        </div>
                        <div class="col-lg-9 mb-3">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn btn-outline-danger w-100"><i class="bi bi-box-arrow-right m-2"></i> Logout</button>
                            </form>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; {{ date('Y') }} Chris Earl Amar</p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</html>
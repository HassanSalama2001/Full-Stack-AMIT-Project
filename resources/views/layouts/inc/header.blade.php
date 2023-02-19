<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- css files --}}
    <link rel="stylesheet" href="{{asset('/build/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/build/assets/css/all.min.css')}}">
    {{-- font styles --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Pacifico&family=Zeyada&display=swap" rel="stylesheet">
    {{-- Bootstrap links --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/build/assets/js/script.js')}}"></script>
    <title>Index</title>
</head>
<body>
    <nav-bar>
        <!-- second(dark) navbar -->
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <h1 class="logo navbar-brand me-auto mb-2 mb-lg-0"><a href="{{route('home')}}">elprince</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <form class="d-flex w-25 m-auto" action="{{route('product.all')}}" method="GET" role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" value="{{ request('search') }}" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    @if (isset($search))
                    {{dd($search)}}
                        <ul class="list-group mt-3">
                            @forelse($search as $s)
                                <li class="list-group-item">{{ $s->name }}</li>
                            @empty
                                <li class="list-group-item list-group-item-danger">Not Found</li>
                            @endforelse
                        </ul>
                    @endif
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category', 2)}}">Women</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category', 1)}}">Men</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{route('cart.show', ['user_id' => Auth::user()->id,'instance' => 'wishlist'])}}" class="nav-link">Wishlist</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cart.show', ['user_id' => Auth::user()->id,'instance' => 'cart'])}}" class="nav-link">
                                    <span>
                                        <i class="fas fa-cart-shopping"></i>
                                    </span>
                                    My Cart
                                </a>
                            </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('register')}}" class="nav-link">Register</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end of secind(dark) navbar -->
    </nav-bar>

@extends('layouts.main')


@section("content")

    <section class="Carousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('/build/assets/img/triple.jpg')}}" class="d-block w-100"  height="500px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('/build/assets/img/triple2.jpg')}}" class="d-block w-100" height="500px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('/build/assets/img/triple3.jpg')}}" class="d-block w-100" height="500px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="Collections w-75 m-auto mt-5">
        <div class="grid-container">
            <div class="grid1">
                <img src="{{asset('/build/assets/img/model1.jpg')}}">
            </div>
            <div class="grid2">
                <img src="{{asset('/build/assets/img/model2.jpg')}}">
            </div>
            <div class="grid3">
                <h4>Hot Collection</h4>
                <h2>New Trend For Women</h2>
                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam adipisci soluta facilis architecto hic nemo officiis ea saepe laborum mollitia provident, ipsam dolor quisquam eveniet voluptas. Error, magnam rem.</P>
                <a class="btn btn-outline-danger" href="{{route('category', 2)}}">SHOP NOW</a>
            </div>
            <div class="grid4">
                <img src="{{asset('/build/assets/img/model3.jpg')}}">
            </div>
        </div>
    </section>

    <section class="Featured-Items m-5">
        <h3><center>Featured-Items</center></h3>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('product.all')}}">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category', 1)}}">Men</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category', 2)}}">Women</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category', 3)}}">Kids</a>
            </li>
        </ul>

    </section>

    <section class="Offers">
        <div class="container">
            <div class="row">
                <div class="col-6"><img src="{{asset('/build/assets/img/triple2.jpg')}}" alt="" width="100%" height="200px"></div>
                <div class="col-6"><img src="{{asset('/build/assets/img/triple3.jpg')}}" alt="" width="100%" height="200px"></div>
            </div>
        </div>
    </section>

    <section class="Newest-Items m-5">
        <h3><center>Newest-Items</center></h3>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('product.all')}}">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category', 1)}}">Men</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category', 2)}}">Women</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category', 3)}}">Kids</a>
            </li>
        </ul>
        <div class="container mt-3">
            <div class="row">
                @if (isset($newest))
                    @foreach ($newest as $p)
                        <div class="col-3 mb-3">
                            <img src='{{asset("/storage/$p->image")}}' alt="">
                            <p>{{$p->name}}</p>
                            <p>{{$p->price}}</p>
                            <div class="links">
                                <a href="{{route('cart.add', ['instance' => 'wishlist', 'product_id' => $p->id])}}"><i class="fas fa-heart"></i></a>
                                <a href="{{route('cart.add', ['instance' => 'cart', 'product_id' => $p->id])}}"><i class="fas fa-cart-shopping"></i></a>
                                {{-- <a href="#"><i class="fas fa-share-nodes"></i></a> --}}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <center><a class="btn btn-primary" href="{{route('product.all')}}">SEE MORE</a></center>
    </section>

    <!-- has background image -->
    <section class="quote mt-5 mb-5">
        <div class="text-background">
            <div class="text">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus tenetur, alias, nisi neque minima reiciendis cum ipsum iure nam laborum expedita sunt officia quidem perferendis ipsam, at labore sed praesentium.</p>
                <img src="{{asset('/build/assets/img/26594.JPEG')}}" alt="..." width="50px" height="50px">
                <h6>Hassan Mohamed</h6>
                <p>CEO of TTCM</p>
            </div>
        </div>
    </section>

    {{-- <section class="Latest-Blog">
        <div class="container">
            <div class="row">
                <center><h3 class="mb-3">Latest Blog</h3></center>
                <div class="col-4">
                    <img src="{{asset('/build/assets/img/background.jpg')}}" alt="..." width="100%" height="200px">
                    <h3>Some Headline Here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia laudantium, sit quaerat maxime aperiam ipsa, placeat non suscipit quis eaque aut! Facere iusto harum quo aut eos magni sint impedit.</p>
                    <button>READ MORE</button>
                </div>
                <div class="col-4">
                    <img src="{{asset('/build/assets/img/triple3.jpg')}}" alt="..." width="100%" height="200px">
                    <h3>Some Headline Here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia laudantium, sit quaerat maxime aperiam ipsa, placeat non suscipit quis eaque aut! Facere iusto harum quo aut eos magni sint impedit.</p>
                    <button>READ MORE</button>
                </div>
                <div class="col-4">
                    <img src="{{asset('/build/assets/img/model9.jpg')}}" alt="..." width="100%" height="200px">
                    <h3>Some Headline Here</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia laudantium, sit quaerat maxime aperiam ipsa, placeat non suscipit quis eaque aut! Facere iusto harum quo aut eos magni sint impedit.</p>
                    <button>READ MORE</button>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="Shop-By-Brand mt-5 mb-5">
        <div class="container">
            <div class="row">
                <center><h3>Shop By Brand</h3></center>
                <div class="col-3">
                    <img src="{{asset('/build/assets/img/brand1.png')}}" alt="..." width="80%" height="80px">
                </div>
                <div class="col-3">
                    <img src="{{asset('/build/assets/img/brand2.png')}}" alt="..." width="80%" height="80px">
                </div>
                <div class="col-3">
                    <img src="{{asset('/build/assets/img/brand3.png')}}" alt="..." width="80%" height="80px">
                </div>
                <div class="col-3">
                    <img src="{{asset('/build/assets/img/brand4.png')}}" alt="..." width="80%" height="80px">
                </div>
            </div>
        </div>
    </section>

@endsection

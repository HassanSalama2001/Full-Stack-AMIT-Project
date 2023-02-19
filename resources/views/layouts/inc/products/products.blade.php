@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            @if (isset($categories))
                @if (sizeof($categories->Products) > 0)
                    @foreach ($categories->Products as $p)
                        <div class="col-3 mb-3">
                            <a href="{{ route('product.show', $p->id) }}" style="color: black; text-decoration:none;">
                                <img src='{{ asset("/storage/$p->image") }}' width="250px" height="300px" alt="...">
                                <p>{{ $p->name }}</p>
                                <p>${{ $p->price }}</p>
                            </a>
                            <div class="links">
                                <a href="{{ route('cart.add', ['instance' => 'wishlist', 'product_id' => $p->id]) }}"><i
                                        class="bi bi-heart-fill"></i></a>
                                <a href="{{ route('cart.add', ['instance' => 'cart', 'product_id' => $p->id]) }}"><i
                                        class="fas fa-cart-shopping"></i></a>
                                {{-- <a href="#"><i class="fas fa-share-nodes"></i></a> --}}
                            </div>
                        </div>
                    @endforeach
                @else
                    @if (isset($category))
                        @if (sizeof($products) > 0)
                            @foreach ($products as $p)
                                <div class="col-3 mb-3">
                                    <a href="{{ route('product.show', $p->id) }}"
                                        style="color: black; text-decoration:none;">
                                        <img src='{{ asset("/storage/$p->image") }}' width="250px" height="300px"
                                            alt="...">
                                        <p>{{ $p->name }}</p>
                                        <p>${{ $p->price }}</p>
                                    </a>
                                    <div class="links">
                                        <a
                                            href="{{ route('cart.add', ['instance' => 'wishlist', 'product_id' => $p->id]) }}"><i
                                                class="fas fa-heart"></i></a>
                                        <a href="{{ route('cart.add', ['instance' => 'cart', 'product_id' => $p->id]) }}"><i
                                                class="fas fa-cart-shopping"></i></a>
                                        {{-- <a href="#"><i class="fas fa-share-nodes"></i></a> --}}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="w-75 m-auto mb-3 not-found text-center">
                                Not Found
                            </div>
                        @endif
                    @else
                        <div class="w-75 m-auto mb-3 not-found text-center">
                            Not Found
                        </div>
                    @endif
                @endif
            @endif
        </div>
    </div>
@endsection

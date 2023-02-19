@extends("layouts.main")

@section("content")
    <div class="container m-5 text-center">
        <div class="row">
                <div class="col-6">
                    <img src='{{ asset("/storage/$products->image") }}' alt="{{ $products->name }}">
                </div>
                <div class="col-4 m-5">
                    <table class="m-5">
                        <tr>
                            <td>ID:</td>
                            <td>{{ $products->id }}</td>
                        </tr>
                        <tr>
                            <td>Category:</td>
                            <td>{{ $products->categories_id }}</td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td>{{ $products->name }}</td>
                        </tr>
                        <tr>
                            <td>price:</td>
                            <td>${{ $products->price }}</td>
                        </tr>
                    </table>
                    @if(Auth::user()->role == '1')
                        <div class="m-4">
                            <a class="btn btn-secondary" href="{{route('product.edit', $products->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('product.delete', $products->id)}}">Delete</a>
                        </div>
                    @else
                        <div class="m-4">
                            <a class="btn btn-outline-primary" href="{{route('cart.add', ['instance' => 'cart', 'product_id' => $products->id])}}">Add to Cart</a>
                            <a class="btn btn-outline-success" href="{{route('cart.add', ['instance' => 'wishlist', 'product_id' => $products->id])}}">Add to Wishlist</a>
                        </div>
                    @endif
                </div>
        </div>
    </div>
@endsection

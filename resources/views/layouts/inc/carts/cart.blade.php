@extends('layouts.main')

@section('content')
    @if (sizeof($cart->content()) > 0)
        <div class="w-75 m-auto">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('status') }}
                </div>
            @elseif ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product</th>
                        @if ($instance == 'cart')
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        @endif
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cart->content() as $c)
                        <tr>
                            <td>
                                <a href="{{ route('product.show', $c->id) }}">
                                    @php($path = $c->options->image)
                                    <img src='{{ asset("/storage/$path") }}' alt="{{ $c->name }}" width="100px"
                                        height="100px">
                                </a>
                            </td>
                            <td>
                                <a class="text-dark" href="{{ route('product.show', $c->id) }}">
                                    <p><strong>{{ $c->name }}</strong></p>
                                </a>
                            </td>
                            @if ($instance == 'cart')
                                <td><input type="number" value="{{ $c->qty }}"
                                        onchange="change('{{ $c->rowId }}', this.value)" /></td>
                                <td>${{ $c->price }}</td>
                                <td>${{ $c->subtotal }}</td>
                            @endif
                            <td>
                                @if ($instance == 'cart')
                                    <a class="btn btn-warning m-2 p-2" id="{{ $c->rowId }}" onclick="">Edit</a>
                                @else
                                    <a href="{{route('cart.add', ['instance' => 'cart', 'product_id' => $c->id])}}" class="btn btn-primary m-2 p-2" id="{{ $c->rowId }}" onclick="">Add to Cart</a>
                                @endif
                                <a class="btn btn-danger m-2 p-2"
                                    href="{{ route('cart.delete', ['rowId' => $c->rowId, 'instance' => $instance]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                @if ($instance == 'cart')
                    <tfoot>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Subtotal</td>
                            <td>{{ $cart->subtotal }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Tax</td>
                            <td>{{ $cart->tax }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Total</td>
                            <td>{{ $cart->total }}</td>
                            @if (sizeof($cart->content()))
                                <td><a href="{{route('order.store')}}" class="btn btn-primary">Checkout</a></td>
                            @endif
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    @else
    <div class="w-75 m-auto mt-3 mb-3 not-found text-center">
        No Produts Added
    </div>
    @endif
@endsection

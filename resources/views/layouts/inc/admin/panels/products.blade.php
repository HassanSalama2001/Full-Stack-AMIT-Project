@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center m-3">
                <a class="btn btn-primary m-2 p-2" href="{{ route('product.create') }}" onclick="">Add New Product</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (sizeof($products) > 0)
                        <table class="table table-striped w-75 m-auto">
                            <tr>
                                <th>Image</th>
                                <th>Category_ID</th>
                                <th>Product_ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Options</th>
                            </tr>
                            @foreach ($products as $p)
                                <tr>
                                    <td><img src='{{ asset("/storage/$p->image") }}' alt="{{ $p->name }}" width="100px"
                                            height="100px"></td>
                                    <td>{{ $p->categories_id }}</td>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>${{ $p->price }}</td>
                                    <td>{{ $p->quantity }}</td>
                                    <td>
                                        <a class="btn btn-warning m-2 p-2" href="{{ route('product.edit', $p->id) }}"
                                            onclick="">Edit</a>
                                        <a class="btn btn-danger m-2 p-2" href="{{ route('product.delete', $p->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="w-75 m-auto mt-3 mb-3 not-found text-center">
                            Not Products Found
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

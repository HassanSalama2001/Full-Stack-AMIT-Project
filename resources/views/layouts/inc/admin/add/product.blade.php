@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                    <div class="text-center m-5">
                        <h3 class="m-5" style="font-weight:bold; font-size:28px">Add New Product</h3>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="w-75 m-auto">
                                <tr>
                                    <td>
                                        @foreach ($categories as $cat)
                                            <input type="radio" class="btn-check" value="{{ $cat->id }}" name="categories_id" id="{{$cat->id}}" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="{{ $cat->id }}">{{ $cat->id }}.&nbsp;{{ $cat->Category }}</label>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control m-2" name="name"
                                            placeholder="Enter Product Name"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control m-2" name="price"
                                            placeholder="Enter Product Price"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="number" class="form-control m-2" name="quantity"
                                            placeholder="Enter Product Quantity">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="file" class="form-control m-2" name="image" required></td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-outline-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

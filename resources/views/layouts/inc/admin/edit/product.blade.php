@extends("layouts.admin")

@section("content")
    <div class="container mt-5 text-center">
        <div class="row">
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
            <div class="col-6 ms-5 ps-5">
                <img class="ms-5 ps-5" src='{{ asset("/storage/$products->image") }}' alt="{{ $products->name }}" width="300px" height="300px">
                {{-- <input type="file" class="form-control mt-3 w-75 m-auto" name="image" onclick="filename()"/>
                <label id="filename" class="d-none">{{$products->image}}</label> --}}
            </div>
            <div class="col-4">
                <form action="{{ route('product.update', $products->id) }}" method="POST">
                    @csrf
                    <table class="m-5">
                        <tr>
                            <td>ID:</td>
                            <td><input class="form-control" type="text" name="id" value="{{$products->id}}" readonly/></td>
                        </tr>
                        <tr>
                            <td>Category:</td>
                            <td><input class="form-control" type="text" name="categories_id" value="{{$products->categories_id}}"/></td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td><input class="form-control" type="text" name="name" value="{{$products->name}}"/></td>
                        </tr>
                        <tr>
                            <td>price:</td>
                            <td><input class="form-control" type="number" name="price" value="{{$products->price}}"/></td>
                        </tr>
                        <tr>
                            <td>Quantity:</td>
                            <td><input class="form-control" type="number" name="quantity" value="{{$products->quantity}}"/></td>
                        </tr>
                    </table>
                    <input class="btn btn-outline-primary m-4" type="submit" name="submit" value="Update"/>
                </form>
            </div>
        </div>
    </div>
@endsection

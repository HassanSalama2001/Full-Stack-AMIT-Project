@extends("layouts.admin")

@section("content")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center m-3">
                <a class="btn btn-primary m-2 p-2" href="{{route('category.create')}}" onclick="">Add New Category</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (sizeof($categories) > 0)
                        <table class="table table-striped w-75 m-auto">
                            <tr>
                                <th>Category_ID</th>
                                <th>Name</th>
                                <th>Products Quantity</th>
                                <th>Options</th>
                            </tr>
                            @foreach ($categories as $cat)
                                <tr>
                                    <td>{{$cat->category_id}}</td>
                                    <td>{{$cat->category_name}}</td>
                                    <td>{{$cat->product_Quantity}}</td>
                                    <td>
                                        <a class="btn btn-warning m-2 p-2" href="{{route('category.edit', $cat->category_id)}}" onclick="">Edit</a>
                                        <a class="btn btn-danger m-2 p-2" href="{{route('category.delete', $cat->category_id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <p><strong>Note* </strong>Each Category Must Have atleast <strong>1 Product<strong> to Appear in this Table </p>
                    @else
                        <div class="w-75 m-auto mt-3 mb-3 not-found text-center">
                            No Categories Found
                            <p><strong>Note* </strong>Each Category Must Have atleast <strong>1 Product</strong> to Appear in this Table</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

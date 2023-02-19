@extends("layouts.admin")

@section("content")
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
                    <div class="text-center m-auto w-50 mt-5 mb-5">
                        <h2>Add New Category</h2>
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <table class="w-75 m-auto">
                                <tr>
                                    <td><input type="text" class="form-control m-2" name="Category" placeholder="Enter Product Name" required></td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-outline-primary">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

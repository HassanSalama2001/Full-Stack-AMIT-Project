@extends("layouts.admin")

@section("content")
    <div class="container m-5">
        <div class="w-50 m-auto">
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
            <form class="text-center" action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                <table class="m-3" style="float: left">
                    <tr>
                        <td>ID:</td>
                        <td><input class="form-control" type="text" name="id" value="{{$category->id}}" readonly/></td>
                    </tr>
                    <tr>
                        <td>Category Name:</td>
                        <td><input class="form-control" type="text" name="Category" value="{{$category->Category}}"/></td>
                    </tr>
                </table>
                <input class="btn btn-outline-primary mt-5" type="submit" name="submit" value="Update"/>
            </form>
        </div>
    </div>
@endsection

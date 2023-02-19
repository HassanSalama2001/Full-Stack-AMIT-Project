@extends("layouts.admin")

@section("content")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (isset($orders))
                        @if (sizeof($orders) > 0)
                            @foreach ($orders as $order)
                                <div class="col-3 m-3">
                                    <div class="m-2">
                                        <table class="table">
                                            <tr>
                                                <td>Order ID:</td>
                                                <td>{{$order->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>User:</td>
                                                <td>{{$order->cart_id}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="links text-center">
                                        <a class="btn btn-success" href="{{route('order.update', ['order' => $order->id, 'state' => '1'])}}">Approve</a>
                                        <a class="btn btn-danger" href="{{route('order.update', ['order' => $order->id, 'state' => '2'])}}">Decline</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="w-75 m-auto mb-3 text-center">
                                No Pending Orders Found
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

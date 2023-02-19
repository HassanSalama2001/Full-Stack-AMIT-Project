@extends('layouts.main')

@section('content')
    @if (sizeof($orders) > 0)
        <div class="w-75 m-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>State</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>
                                @if ($order->state == '2')
                                    <p class="text-danger">Declined</p>
                                @elseif ($order->state == '1')
                                    <p class="text-success">Accepted</p>
                                @else
                                    <p class="text-warning">Pending</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="w-75 m-auto mt-3 mb-3 not-found text-center">
            No Orders Found Yet
        </div>
    @endif
@endsection

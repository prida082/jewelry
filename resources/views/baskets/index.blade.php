@extends('layouts.app')

@section('content')
@csrf
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="table-success">
                    <tr>
                        <th>product name</th>
                        <th>price</th>
                        <th>amount</th>
                        <th>Check Out</th>
                    </tr>
                </thead>
                <tbody>
                    @if($order)
                    @foreach ($order->order_details as $item)
                    <tr>
                        <td>{{ $item -> product_name }}</td>
                        <td>{{ $item -> price}}</td>
                        <td>{{ $item -> amount}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $order -> total }}</td>
                        <td class="text-center">
                            <form action="{{route('baskets.update', $order->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <input type="hidden" name="value" value="checkout">
                                <button class="btn btn-outline-success" type="submit">Checkout</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
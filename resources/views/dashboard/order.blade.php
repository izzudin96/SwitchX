@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Manage Orders
        </div>
        
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>Username</td>
                        <td>Payment Reference</td>
                        <td>Payment Status</td>
                        <td>Status</td>
                        <td>Amount</td>
                        <td>Details</td>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            @if($order->payment_references)
                                <td>Uploaded</td>
                            @else
                                <td>No upload</td>
                            @endif
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->amount }}</td>
                            <td><a href="/order/{{ $order->id }}/edit">Manage</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-2">
    @include('dashboard/sidebar')
</div>


@endsection
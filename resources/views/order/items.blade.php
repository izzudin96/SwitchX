<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Items Ordered
        </strong>
    </div>
    <div class="panel-body">
        <table class="table table-hover table-items">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Option</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->pivot->attribute }}</td>
                        <td>RM {{ $item->price }}</td>
                        <td>{{ $item->pivot->quantity }}</td>
                        <td>{{ $item->pivot->quantity * $item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="order-summary">
            <p><strong>Total Price:</strong> RM {{ $order->amount }}</p>
            <p><strong>Shipping:</strong> RM {{ $order->shippingCost }}</p>
            <p><strong>Grand total:</strong> RM {{ $order->amount + $order->shippingCost  }}</p>
        </div>
        
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Items Ordered
        </strong>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Attribute</th>
                    <th>Price/unit</th>
                    <th>Quantity</th>
                    <th>Price*Quantity</th>
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

                <tr>   
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Amount</td>
                    <td>RM {{ $order->amount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
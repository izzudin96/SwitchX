<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            ITEMS ORDERED
        </strong>
    </div>

    <div class="class panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Shirt</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Stock Status</th>
                    <th>Remove Shirt</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->attribute }}</td>
                    <td>RM {{ $product->price }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ $product->price * $product->pivot->quantity }}</td>
                    <td>
                        @if($product->pivot->quantity > 
                        $order->products->find($product->id)->attributes()->where('name', $product->pivot->attribute)->first()->stock)
                        <span class="label label-danger">Insufficient Stock</span>
                        @elseif($product->pivot->quantity <= $order->products->find($product->id)->attributes()->where('name', $product->pivot->attribute)->first()->stock)
                        <span class="label label-success">In Stock</span>
                        @endif
                    </td>
                    <td>
                        <form action="/order/item/{{ $product->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="attribute" value="{{ $product->pivot->attribute }}">
                            <button class="btn btn-warning" type="submit">
                                Remove Item
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td><strong>RM {{ $grandTotalPrice }}</strong></td>
                    <td><strong>Shipping</strong></td>
                    <td><strong>RM {{ $shipping }}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Grand Total</strong></td>
                    <td>RM {{ $grandTotalPrice + $shipping }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
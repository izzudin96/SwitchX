<div class="panel panel-default">
    <div class="panel-heading product-stock">
        Stock Availability
    </div>

    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        option
                    </th>
                    <th>
                        stock
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->attributes as $attribute)
                <tr>
                    <td>
                        {{ $attribute->name }}
                    </td>
                    <td>
                        {{ $attribute->stock }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        Stock Information
    </div>

    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">
                        Attribute
                    </th>
                    <th class="text-center">
                        Quantity
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->attributes as $attribute)
                <tr>
                    <td class="text-center">
                        {{ $attribute->name }}
                    </td>
                    <td class="text-center">
                        <span class="label label-primary">
                            {{ $attribute->stock }} left
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
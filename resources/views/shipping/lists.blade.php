<table class="table table-striped">
    <tbody>
        <tr>
            <td>Id</td>
            <td>Box Name</td>
            <td>Unit Covered</td>
            <td>Price (RM)</td>
            <td>Action</td>
        </tr>
        @foreach($shippings as $shipping)
        <tr>
            <td>{{ $shipping->id }}</td>
            <td>{{ $shipping->name }}</td>
            <td>{{ $shipping->unit }}</td>
            <td>{{ $shipping->price }}</td>
            <td>
                <form method="POST" action="/shipping">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                    <input type="hidden" name="id" value="{{ $shipping->id }}">

                    <button type="submit" class="btn btn-danger">
                        Delete Status
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
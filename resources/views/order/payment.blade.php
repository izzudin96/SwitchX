<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Payment References
        </strong>
    </div>
    <form class="panel-body" method="POST" action="/order/{{ $order->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        {{ method_field('PATCH') }}
        
        <input type="file" name="payment"></input>

        <button class="btn btn-success" type="submit">
            Upload Payment Reference
        </button>
        
        <div class="container">
            <div class="row">
                <img class="img-responsive" src="{{ Storage::url($order->payment_reference) }}" alt="">
            </div>
        </div>
    </form>
</div>
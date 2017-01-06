<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Payment Reference
        </strong>
    </div>

    <div class="panel-body">
        <form class="form-horizontal col-md-offset-3 col-sm-offset-3" method="POST" action="/order/{{ $order->id }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            {{ method_field('PATCH') }}

            <div class="form-group container">
                <label class="btn btn-default">
                    Browse <input type="file"  name="payment"></input>
                </label>
                <button class="btn btn-success" type="submit">
                    Upload
                </button>
            </div>
        </form>


        @if($order->payment_reference)
            <div class="col-md-12">
                <img class="img-responsive img-payment" src="{{ Storage::url($order->payment_reference) }}" alt="">
            </div>
        @endif


    </div>
    
</div>
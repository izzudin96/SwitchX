<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Shipping Information
        </strong>
    </div>
    <div class="panel-body">
        <div class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-4 control-label" for="status">
                    Submitted
                </label>
                <div class="col-md-6 panel-align">
                    {{ date('F d, Y', strtotime($order->created_at)) }}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="status">
                    Status
                </label>
                <div class="col-md-6 panel-align">
                    {{ $order->status }}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="status">
                    Payment Status
                </label>
                <div class="col-md-6 panel-align">
                    {{ $order->payment_status }}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="address">
                    Address
                </label>
                <div class="col-md-6 panel-align">
                    <address>
                        <strong>{{ $order->name }} 
                            <small>
                                {{ $order->phone }}
                            </small>
                        </strong><br>
                        {{ $order->address }},<br> {{ $order->poscode }} {{ $order->city }},<br> {{ $order->state }}. 
                    </address>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="tracking_number">
                    Tracking Number
                </label>
                <div class="col-md-6 panel-align">
                    @if(!$order->post_tracking == null)
                    <a target="_blank" href="http://poslaju.com.my/track-trace/#trackingIds={{ $order->post_tracking }}">{{ $order->post_tracking }}
                    </a>
                    @else
                    <p>Poslaju tracking number will appear here after we have sent the parcel.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
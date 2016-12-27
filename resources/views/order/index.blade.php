@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach ($orders as $order)
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>
							Order #{{ $order->id }}
						</strong>
					</div>

					<div class="panel-body">
						<div class="form-horizontal" role="form">

							<div class="form-group">
								<label class="col-md-4 control-label" for="created_on">
									Created On
								</label>
								<div class="col-md-6 panel-align">
									{{ date('F d, Y', strtotime($order->created_at)) }}
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="ship_to">
									Ship To
								</label>
								<div class="col-md-6 panel-align">
									<address>
	                                    <strong>{{ $order->name }} 
	                                    	<small>
	                                    		{{ $order->phone }}
	                                    	</small>
	                                    </strong><br>
	                                    {{ $order->address }},<br> 
	                                    {{ $order->poscode }} 
	                                    {{ $order->city }},<br> 
	                                    {{ $order->state }}. 
	                                </address>
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

							@if(!$order->post_tracking == null)
							<div class="form-group">
								<label class="col-md-4 control-label" for="status">
									Poslaju Tracking
								</label>
								<div class="col-md-6 panel-align">
									{{ $order->post_tracking }}
								</div>
							</div>
							@endif

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<a class="btn btn-primary" href="/order/{{ $order->id }}">
										View Order Detail
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection
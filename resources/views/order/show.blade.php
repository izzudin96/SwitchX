@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						Details on Order #{{ $order->id }}
					</strong>
				</div>
				<div class="panel-body">
					<div class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-md-4 control-label" for="status">
								Status
							</label>
							<div class="col-md-6 panel-align">
								{{ $order->status }}
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
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						Pay to who?
					</strong>
				</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-md-4 control-label" for="address">
								Bank Name
							</label>
							<div class="col-md-6 panel-align">
								Maybank
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="address">
								Account Name
							</label>
							<div class="col-md-6 panel-align">
								1621 0718 9743
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="address">
								Holder's Name
							</label>
							<div class="col-md-6 panel-align">
								Izzudin Anuar
							</div>
						</div>
					</form>
				</div>
			</div>

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
						Upload Payment References
					</button>

					<img src="{{ Storage::url($order->payment_references) }}" alt="">
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
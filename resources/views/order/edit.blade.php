@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>
				Update Order Information
			</strong> 
		</div>

		<div class="panel-body">
			<form class="form-horizontal" role="form" action="/order/{{ $order->id }}/edit" method="POST">
				{{ csrf_field() }}
				{{ method_field("PATCH") }}

				<div class="form-group">
					<label class="col-md-4 control-label" for="status">
						Status
					</label>

					<div class="col-md-6">
						<input value="{{ $order->status }}" type="text" class="form-control" name="status" placeholder="Order completed">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="payment_status">
						Payment Status
					</label>

					<div class="col-md-6">
						<select name="payment_status" class="form-control">
							<option selected>
								@if ($order->payment_status == 0)
									 Unverified 
								@elseif ($order->payment_status == 1)
									Verified
								@else
									False Upload
								@endif
							</option>
							<option value="0">Unverified</option>
							<option value="1">Verified</option>
							<option value="3">False upload</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="shippingCost">
						Shipping Cost (RM)
					</label>

					<div class="col-md-6">
						<input value="{{ $order->shippingCost }}" type="text" class="form-control" name="shippingCost" placeholder="18">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="status">
						Poslaju Tracking Number
					</label>

					<div class="col-md-6">
						<input value="{{ $order->post_tracking }}" type="text" class="form-control" name="post_tracking" placeholder="EP374673457MY">
					</div>
				</div>

				<hr>

				<div class="form-group">
					<label class="col-md-4 control-label" for="name">
						Name
					</label>

					<div class="col-md-6">
						<input value="{{ $order->name }}" type="text" class="form-control" name="name" placeholder="Receiver Name">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="address">
						Address
					</label>

					<div class="col-md-6">
						<textarea name="address" class="form-control" rows="6" placeholder="Where do you want the shirt to be shipped?">{{ $order->address }}</textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="poscode">
						Poscode
					</label>

					<div class="col-md-6">
						<input value="{{ $order->poscode }}" type="text" class="form-control" name="poscode" placeholder="Poscode">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="city">
						City
					</label>

					<div class="col-md-6">
						<input value="{{ $order->city }}" type="text" class="form-control" name="city" placeholder="City">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="state">State</label>

					<div class="col-md-6">
						<input value="{{ $order->state }}" type="text" class="form-control" name="state" placeholder="State">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="phone">
						Phone Number
					</label>

					<div class="col-md-6">
						<input value="{{ $order->phone }}" type="text" class="form-control" name="phone" placeholder="Receiver Contact Number">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Update Order
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			Delete order
		</div>
		
		<div class="panel-body">
			<form class="form-horizontal" role="form" action="/order/{{ $order->id }}/edit" method="POST">
				{{ csrf_field() }}
				{{ method_field("DELETE") }}
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-danger">
							Delete Order
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
					

</div>

@endsection
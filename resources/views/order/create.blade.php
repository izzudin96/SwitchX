@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Items ordered</strong>
			</div>
			<div class="container">
				@foreach($order->shirts as $shirt)
					Shirt Name: {{ $shirt->name }} <br>
					Shirt Size: {{ $shirt->pivot->attribute }} <br>
					Shirt Price: {{ $shirt->price }} <br>
					<br>
				@endforeach
			</div>
		</div>



			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						Shipping Information:
					</strong> Where do you want we ship your shirts?
				</div>

				<div class="panel-body">
					<form class="form-horizontal" role="form" action="/order/form" method="POST">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label" for="name">
								Name
							</label>

							<div class="col-md-6">
								<input value="{{ $order->name }}" type="text" class="form-control" name="name" placeholder="Receiver Name">

								@if ($errors->has('name'))
									<span class="help-block">
										<strong>
											{{ $errors->first('name') }}
										</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label" for="address">Address
							</label>

							<div class="col-md-6">
								<textarea name="address" class="form-control" rows="6" placeholder="Where do you want the shirt to be shipped?">{{ $order->address }}</textarea>

								@if ($errors->has('address'))
									<span class="help-block">
										<strong>
											{{ $errors->first('address') }}
										</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('poscode') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label" for="poscode">
								Poscode
							</label>

							<div class="col-md-6">
								<input value="{{ $order->poscode }}" type="text" class="form-control" name="poscode" placeholder="Poscode">

								@if ($errors->has('poscode'))
									<span class="help-block">
										<strong>
											{{ $errors->first('poscode') }}
										</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label" for="city">
								City
							</label>

							<div class="col-md-6">
								<input value="{{ $order->city }}" type="text" class="form-control" name="city" placeholder="City">

								@if ($errors->has('city'))
									<span class="help-block">
										<strong>
											{{ $errors->first('city') }}
										</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label" for="state">State</label>

							<div class="col-md-6">
								<input value="{{ $order->state }}" type="text" class="form-control" name="state" placeholder="State">

								@if ($errors->has('state'))
									<span class="help-block">
										<strong>
											{{ $errors->first('state') }}
										</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label" for="phone">
								Phone Number
							</label>

							<div class="col-md-6">
								<input value="{{ $order->phone }}" type="text" class="form-control" name="phone" placeholder="Receiver Contact Number">

								@if ($errors->has('phone'))
									<span class="help-block">
										<strong>
											{{ $errors->first('phone') }}
										</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Submit Order
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
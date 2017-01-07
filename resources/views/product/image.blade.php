@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">

				<div class="panel-heading">
					<strong>
						Upload image for {{ $product->name }}
					</strong>
				</div>
				
				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/product/{{ $product->uri($product->name) }}/image" enctype="multipart/form-data">
						{{ csrf_field() }}
						
						<div class="form-group">
							<label class="btn btn-default">
								Browse <input type="file"  name="image"></input>
							</label>

							<button class="btn btn-success" type="submit">
								Upload Image
							</button>
						</div>
						
					</form>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						Uploaded images
					</strong>
				</div>
				
				<div class="panel-body">
					@foreach($product->images as $image)
					<div class="col-md-6">
						<img class="img-responsive" src="{{ Storage::url($image->path) }}" alt="">

						<div class="image-action">
							<div class="col-md-6">
								<form action="/product/{{ $product->uri($product->name) }}/image" method="POST">
									{{ csrf_field() }}
									{{ method_field("DELETE") }}
									<input type="hidden" name="image" value="{{ $image->id }}">

									<button class="btn btn-danger" type="submit">
										Delete Image
									</button>
								</form>
							</div>
							
							<div class="col-md-6">
								<form action="/product/{{ $product->uri($product->name) }}/image" method="POST">
									{{ csrf_field() }}
									{{ method_field("PATCH") }}
									<input type="hidden" name="image" value="{{ $image->id }}">

									<button class="btn btn-info" type="submit">
										Make Default
									</button>
								</form>
							</div>
						</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
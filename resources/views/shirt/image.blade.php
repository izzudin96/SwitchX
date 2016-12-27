@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						Upload image for {{ $shirt->name }}
					</strong>
				</div>
				<form class="panel-body" method="POST" action="/shirt/{{ $shirt->uri($shirt->name) }}/image" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input type="hidden" name="test" value="1">

					<input type="file" name="image"></input>

					<button class="btn btn-success" type="submit">
						Upload Image
					</button>
				</form>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						Uploaded images
					</strong>
				</div>
				
				<div class="panel-body">
					@foreach($shirt->images as $image)
						<div class="col-md-6">
							<img class="img-responsive" src="{{ Storage::url($image->path) }}" alt="">
							
							<div class="col-md-6">
								<form action="/shirt/{{ $shirt->uri($shirt->name) }}/image" method="POST">
									{{ csrf_field() }}
									{{ method_field("DELETE") }}
									<input type="hidden" name="image" value="{{ $image->id }}">

									<button class="btn btn-danger" type="submit">
										Delete Image {{ $image->id }}
									</button>
								</form>
							</div>
							
							<div class="col-md-6">
								<form action="/shirt/{{ $shirt->uri($shirt->name) }}/image" method="POST">
									{{ csrf_field() }}
									{{ method_field("PATCH") }}
									<input type="hidden" name="image" value="{{ $image->id }}">

									<button class="btn btn-info" type="submit">
										Make Default {{ $image->id }}
									</button>
								</form>
							</div>

							
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
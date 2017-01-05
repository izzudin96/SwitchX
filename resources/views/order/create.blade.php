@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">

	@include('order.create.item')

	@include('order.create.form')
	
</div>

@endsection
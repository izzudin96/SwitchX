@extends('layouts.app')

@section('content')

<div class="col-md-7">
    @include('product.show.image')
</div>

<div class="col-md-5">

    @include('product.show.info')

    @include('product.show.stock')

    @include('product.show.buy')    

</div>

@endsection
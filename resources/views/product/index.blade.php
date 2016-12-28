
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($products as $product)
                <div class="col-md-6 hcenter">
                    
                    @if($product->images()->where('is_default' , 1)->first())
                        <img class="img-responsive" src="{{ Storage::url($product->images()->where('is_default', 1)->first()->path) }}" alt="">
                    @elseif($product->images()->first())
                        <img class="img-responsive" src="{{ Storage::url($product->images()->first()->path) }}" alt="">
                    @endif


                    <a href="/product/{{ $product->uri($product->name) }}">
                        <h3 class="product-name">{{ $product->name }}</h3>
                    </a>

                    <h4>RM {{ $product->price }}</h4>

                    <h4>Stock {{ $product->stock($product) }}</h4>

                    <a class="btn btn-success" href="/product/{{ $product->uri($product->name) }}">Buy Now</a>
                    
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
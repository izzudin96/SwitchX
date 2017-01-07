@extends('layouts.app')

@section('content')

<div class="col-md-12">

    <h1 class="product-heading">
        Products
    </h1>

    @if(!$products->count())
        <p class="text-center">Sorry... No product yet.</p>
    @endif

    @foreach($products as $product)

        <div class="col-md-4 product">
            @if($product->images()->where('is_default' , 1)->first())
                <a href="/product/{{ $product->uri($product->name) }}">
                    <img class="img-responsive product-image" src="{{ Storage::url($product->images()->where('is_default', 1)->first()->path) }}" alt="">
                </a>
            @elseif($product->images()->first())
                <a href="/product/{{ $product->uri($product->name) }}">
                    <img class="img-responsive product-image" src="{{ Storage::url($product->images()->first()->path) }}" alt="">
                </a>
            @else
                <a href="/product/{{ $product->uri($product->name) }}">
                    <img class="img-responsive product-image" src="http://placehold.it/290x435" alt="">
                </a>
            @endif


            <a href="/product/{{ $product->uri($product->name) }}">
                <h3 class="product-name">{{ $product->name }}</h3>
            </a>

            <h4 class="product-info">RM {{ $product->price }} | {{ $product->totalStock($product) }} left</h4>
        </div>

    @endforeach
    <div class="col-md-offset-3">
        {{ $products->links() }}
    </div>

</div>


@endsection
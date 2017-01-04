
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($products as $product)
                <div class="col-md-6">
                    
                    @if($product->images()->where('is_default' , 1)->first())
                        <img class="img-responsive" src="{{ Storage::url($product->images()->where('is_default', 1)->first()->path) }}" alt="">
                    @elseif($product->images()->first())
                        <img class="img-responsive" src="{{ Storage::url($product->images()->first()->path) }}" alt="">
                    @endif


                    <a href="/product/{{ $product->uri($product->name) }}">
                        <h3 class="product-name">{{ $product->name }}</h3>
                    </a>

                    <h4>RM {{ $product->price }} | {{ $product->totalStock($product) }} left</h4>

                    <a class="btn btn-success" href="/product/{{ $product->uri($product->name) }}">View Product</a>
                    
                </div>
            @endforeach
            {{ $products->links() }}
        </div>
    </div>
</div>


@endsection
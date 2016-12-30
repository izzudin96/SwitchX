@extends('layouts.app')

@section('content')

<div class="col-md-6">
    <h1>
        {{ $product->name }} | RM {{ $product->price }}
    </h1>
    @if($product->images()->where('is_default' , 1)->first())
        {{-- <a href="{{ Storage::url($product->images()->where('is_default', 1)->first()->path) }}" data-lity>
            <img class="img-responsive" src="{{ Storage::url($product->images()->where('is_default', 1)->first()->path) }}" alt="">
        </a> --}}
        <a href="http://placehold.it/555x480" data-lity>
            <img class="img-responsive" src="http://placehold.it/555x480">
        </a>
    @elseif($product->images()->first())
        {{-- <a href="{{ Storage::url($product->images()->first()->path) }}">
            <img class="img-responsive" src="{{ Storage::url($product->images()->first()->path) }}" alt="">
        </a> --}}
    @endif
</div>
<div class="col-md-5 col-md-offset-1">
    <div class="container">
        <div class="row">
            @foreach($product->images()->get() as $image)
                <div class="col-md-6">
                    <a href="{{ Storage::url($image->path) }}" data-lity>
                        <img class="img-responsive" src="{{ Storage::url($image->path) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div> <hr>
    <p>
        {{ $product->description }}
    </p>

    @include('product.stock')

    @include('product.buy')    

</div>

@endsection
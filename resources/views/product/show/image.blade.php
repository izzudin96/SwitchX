@if($product->images()->where('is_default' , 1)->first())
    <a href="{{ Storage::url($product->images()->where('is_default', 1)->first()->path) }}" data-lity>
        <img class="img-responsive product-image" src="{{ Storage::url($product->images()->where('is_default', 1)->first()->path) }}" alt="">
    </a>
@elseif($product->images()->first())
    <a href="{{ Storage::url($product->images()->first()->path) }}" data-lity>
        <img class="img-responsive product-image" src="{{ Storage::url($product->images()->first()->path) }}" alt="">
    </a>
@else
    <a href="http://placehold.it/670x1005" data-lity>
        <img class="img-responsive product-image" src="http://placehold.it/670x1005">
    </a>
@endif

@foreach($product->images()->get() as $image)
    <div class="col-md-6">
        <a href="{{ Storage::url($image->path) }}" data-lity>
            <img class="img-responsive product-image" src="{{ Storage::url($image->path) }}" alt="">
        </a>
    </div>
@endforeach
<h1 class="product-name">
    {{ $product->name }}
</h1>
<p class="product-info">
    RM {{ $product->price }} | {{ $product->totalStock($product) }} left
</p>

<p class="product-description">
    {{ $product->description }}
</p>
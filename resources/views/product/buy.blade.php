@if (Auth::guest())
    <strong>
        <p>
            You need to login to buy the product. Don't worry, the login or registration doesn't take much time.
        </p>
    </strong>
    <a class="btn btn-info" href="/login">
        Login
    </a> 
@else
<div class="panel panel-default">
    <div class="panel-heading">
        Buy the product
    </div>
        
    <div class="panel-body">

        <form action="/order/item" method="POST">
            {{ csrf_field() }}

            <input type="hidden" name="productId" value="{{ $product->id }}"> {{-- fix this --}}
            
            <select name="attribute" class="form-control">
                <option selected disabled>Attributes</option>
                @foreach($product->attributes as $attribute)
                    <option>{{ $attribute->name }}</option>
                @endforeach
            </select>

            <input min="1" type="number" class="form-control" name="quantity" placeholder="Select Quantity">

            <button type="submit" class="col-md-4 pull-right btn btn-default">
                Add Product
            </button>
        </form>

    </div>
</div>
@endif
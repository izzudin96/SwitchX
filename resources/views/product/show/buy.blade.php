@if (Auth::guest())

    <p>
        You need to be <a href="/register">registered</a> and <a href="/login">logged in</a> to buy a product. 
        Don't worry, login or register doesn't take much time.
    </p>
    
@else

    <div class="panel panel-default">
        <div class="panel-heading">
            Buy the product
        </div>
            
        <div class="panel-body">

            <form class="form-horizontal  col-md-offset-1 col-md-10" action="/order/item" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="productId" value="{{ $product->id }}">
                
                <div class="form-group">
                    <label for="form-control">
                        Option
                    </label>
                    <select name="attribute" class="form-control">
                        @foreach($product->attributes as $attribute)
                            <option>{{ $attribute->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="form-control">
                        Quantity
                    </label>
                    <input min="1" type="number" class="form-control" name="quantity" placeholder="Select Quantity">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="col-md-4 pull-right btn btn-default">
                        Add Product
                    </button>
                </div>
                
            </form>

        </div>
    </div>

@endif
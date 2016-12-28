@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <form action="/order/item" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="productId" value="{{ $product->id }}">
                
                <label for="quantity">Attribute</label>
                <input class="form-control" type="text" name="attribute">

                <label for="quantity">Quantity (validate if 0)</label>
                <input class="form-control" type="text" name="quantity">

                <button type="submit" class="btn btn-success form-control">
                    <i class="fa fa-btn fa-bolt"></i> Add product to cart
                </button>

            </form>
        </div>
        <div class="col-md-4 col-md-offset-4">
            @if (count($errors) > 0)
                <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>

        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    
                </div>

                <div class="col-md-12">
                    
                    
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <h1 class="text-center">{{ $product->name }}</h1><hr>
             <h2 class="text-center">RM {{ $product->price }}</h2>
            <h4 class="text-center">{{ $product->description }}</h4>

            <div class="panel panel-default">
                <div class="panel-heading">Stock Information</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Attribute</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->attributes as $attribute)
                        	<tr>
                                <td class="text-center">{{ $attribute->name }}</td>
                                <td class="text-center"><span class="label label-primary">{{ $attribute->stock }} left</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                   {{--  <a href="/uploads/images/default/sizing.jpg" data-lity>
                        <h5 class="text-center">Sizing Guide</h5>
                    </a> --}}
                </div>
            </div>
            
            @if (Auth::guest())
                <strong><p>You need to login to buy the product. Don't worry, the login or registration doesn't take much time. Trust me.</p></strong>
                <a class="btn btn-info" href="/login">Login</a> 
            @else

            <div class="panel panel-default">
                <div class="panel-heading">Buy the product</div>
                <div class="panel-body">
                    <form action="/cart/{{ $product->id }}" method="POST">
                        {{ csrf_field() }}

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="col-md-4 form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                            <select name="size" class="form-control">
                                <option selected disabled>Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>

                            @if ($errors->has('size'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('size') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-4 form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <input min="1" type="number" class="form-control" name="quantity" placeholder="Quantity?">

                            @if ($errors->has('size'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('size') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="col-md-4 pull-right btn btn-default">Add Product to Cart</button>
                    </form>
                </div>
            </div>
            <a class="btn btn-primary" href="/cart"><i class="fa fa-money" aria-hidden="true"></i> Proceed to Cart</a>
            @endif
            <hr>
            @if(Auth::check() && Auth::user()->user_role == 1)
                <h3>Admin section - Upload Product Images</h3>
                <form action="/products/{{ $product->id }}/images" method="POST" class="dropzone">
                    {{ csrf_field() }}
                </form>
                <br>
                <a class="btn btn-info" href=" {{ $product->id }}/edit">Edit Product</a>
                <a class="btn btn-success" href="{{ $product->id }}/stock">Manage Stocks</a>
                <a class="btn btn-danger" href="{{ $product->id }}/delete">Delete Product</a>
            @endif
        </div>

    </div>
            
</div>



@endsection
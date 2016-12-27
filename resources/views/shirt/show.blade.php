@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <form action="/order" method="POST">
                
                {{ csrf_field() }}

                {{ method_field('PATCH') }}

                <input type="hidden" name="shirt_id" value="{{ $shirt->id }}">
                <label for="quantity">Quantity</label>
                <input class="form-control" type="text" name="quantity">

                <label for="quantity">Size</label>
                <input class="form-control" type="text" name="size">


                <button type="submit" class="btn btn-success form-control">
                <i class="fa fa-btn fa-bolt"></i> Add shirt to cart
                </button>

            </form>
        </div>
        <div class="col-md-4 col-md-offset-4">

            @if(Session::has('message'))
                <div class="alert alert-info alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif

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
            <h1 class="text-center">{{ $shirt->name }}</h1><hr>
             <h2 class="text-center">RM {{ $shirt->price }}</h2>
            <h4 class="text-center">{{ $shirt->description }}</h4>

            <div class="panel panel-default">
                <div class="panel-heading">Stock Information</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Shirt Size</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                                <td class="text-center">Double Extra Small</td>
                                <td class="text-center"><span class="label label-primary">{{ $shirt->xxs}} left</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">Extra Small</td>
                                <td class="text-center"><span class="label label-primary">{{ $shirt->xs }} left</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">Small</td>
                                <td class="text-center"><span class="label label-primary">{{ $shirt->s }} left</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">Medium</td>
                                <td class="text-center"><span class="label label-primary">{{ $shirt->m }} left</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">Large</td>
                                <td class="text-center"><span class="label label-primary">{{ $shirt->l }} left</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">Extra-Large</td>
                                <td class="text-center"><span class="label label-primary">{{ $shirt->xl }} left</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">Double Extra Large</td>
                                <td class="text-center"><span class="label label-primary">{{ $shirt->xxl }} left</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">Triple Extra Large</td>
                                <td class="text-center"><span class="label label-primary">{{ $shirt->xxxl }} left</span></td>
                            </tr>
                        </tbody>
                    </table>
                    
                   {{--  <a href="/uploads/images/default/sizing.jpg" data-lity>
                        <h5 class="text-center">Sizing Guide</h5>
                    </a> --}}
                </div>
            </div>
            
            @if (Auth::guest())
                <strong><p>You need to login to buy the shirt. Don't worry, the login or registration doesn't take much time. Trust me.</p></strong>
                <a class="btn btn-info" href="/login">Login</a> 
            @else

            <div class="panel panel-default">
                <div class="panel-heading">Buy the shirt</div>
                <div class="panel-body">
                    <form action="/cart/{{ $shirt->id }}" method="POST">
                        {{ csrf_field() }}

                        <input type="hidden" name="shirt_id" value="{{ $shirt->id }}">
                        
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

                        <button type="submit" class="col-md-4 pull-right btn btn-default">Add Shirt to Cart</button>
                    </form>
                </div>
            </div>
            <a class="btn btn-primary" href="/cart"><i class="fa fa-money" aria-hidden="true"></i> Proceed to Cart</a>
            @endif
            <hr>
            @if(Auth::check() && Auth::user()->user_role == 1)
                <h3>Admin section - Upload Shirt Images</h3>
                <form action="/shirts/{{ $shirt->id }}/images" method="POST" class="dropzone">
                    {{ csrf_field() }}
                </form>
                <br>
                <a class="btn btn-info" href=" {{ $shirt->id }}/edit">Edit Shirt</a>
                <a class="btn btn-success" href="{{ $shirt->id }}/stock">Manage Stocks</a>
                <a class="btn btn-danger" href="{{ $shirt->id }}/delete">Delete Shirt</a>
            @endif
        </div>

    </div>
            
</div>



@endsection
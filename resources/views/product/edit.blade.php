@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $product->name }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role='form' method="POST" action="/product">
                        {{ csrf_field() }}
						{{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Name</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" placeholder="What is the product name?" value="{{ $product->name }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-3 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea placeholder="What is the product description?" name="description" class="form-control" rows="5">{{ $product->description }}</textarea>

                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-3 control-label">Price (RM)</label>
                            <div class="col-md-8">
                                <input min="0" type="number" class="form-control" name="price" placeholder="The price?" value="{{ $product->price }}">

                                @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postUnit') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-3 control-label">Post Unit</label>
                            <div class="col-md-8">
                                <input min="0" type="number" class="form-control" name="postUnit" placeholder="eg: 1,2,5,7,10" value="{{ $product->postUnit }}">

                                @if ($errors->has('postUnit'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('postUnit') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-bolt"></i> Update Product
                                </button>
                            </div>
                        </div>
                    </form>

                    <form class="form-horizontal" role='form' method="POST" action="/product/{{ $product->uri($product->name) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" id="{{ $product->id }}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-bolt"></i> Delete Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit {{ $product->name }}
        </div>

        <div class="panel-body">
            <form class="form-horizontal" role='form' method="POST" action="/product/{{ $product->uri($product->name) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">
                        Name
                    </label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" placeholder="What is the product name?" value="{{ $product->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-3 control-label">
                        Description
                    </label>

                    <div class="col-md-8">
                        <textarea placeholder="What is the product description?" name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-md-3 control-label">Price (RM)</label>
                    <div class="col-md-8">
                        <input min="0" type="number" class="form-control" name="price" placeholder="The price?" value="{{ $product->price }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-md-3 control-label">
                        Post Unit
                    </label>
                    <div class="col-md-8">
                        <input min="0" type="number" class="form-control" name="postUnit" placeholder="eg: 1,2,5,7,10" value="{{ $product->postUnit }}">
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

@endsection